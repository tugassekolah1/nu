<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NuMember;
use App\Models\Payment;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Fixed registration fee. Adjust as needed or move to config/.env.
     */
    private const REGISTRATION_FEE = 5000;

    public function index()
    {
        $members = NuMember::latest()->paginate(10);

        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik'          => 'required|digits:16|unique:nu_members,nik',
            'full_name'    => 'required|max:255',
            'phone'        => 'required|max:20',
            'gender'       => 'required|in:L,P',
            'address'      => 'required',
            'payment_option' => 'required|in:cash,unpaid',
        ]);

        $isCash = $validated['payment_option'] === 'cash';

        $member = NuMember::create([
            'nik'             => $validated['nik'],
            'full_name'       => $validated['full_name'],
            'phone'           => $validated['phone'],
            'gender'          => $validated['gender'],
            'address'         => $validated['address'],
            'status'          => $isCash ? 'active' : 'pending_payment',
            'payment_status'  => $isCash ? 'paid' : 'unpaid',
            'member_card_no'  => $isCash ? $this->generateCardNumber() : null,
        ]);

        Payment::create([
            'nu_member_id'     => $member->id,
            'transaction_code' => $this->generateTransactionCode(),
            'amount'           => self::REGISTRATION_FEE,
            'payment_status'   => $isCash ? 'paid' : 'unpaid',
        ]);

        return redirect()
            ->route('members.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Manually confirm payment for a member who registered as "unpaid".
     */
    public function confirmPayment(NuMember $member)
    {
        if ($member->payment_status === 'paid') {
            return redirect()
                ->route('members.index')
                ->with('info', 'Anggota ini sudah lunas.');
        }

        $member->update([
            'payment_status' => 'paid',
            'status'         => 'active',
            'member_card_no' => $member->member_card_no ?? $this->generateCardNumber(),
        ]);

        // Update the related payment record (latest unpaid one)
        $payment = $member->payments()->where('payment_status', 'unpaid')->latest()->first();
        if ($payment) {
            $payment->update(['payment_status' => 'paid']);
        }

        return redirect()
            ->route('members.index')
            ->with('success', 'Pembayaran dikonfirmasi, anggota kini aktif.');
    }
public function edit(NuMember $member)
{
    return view('admin.members.edit', compact('member'));
}

public function update(Request $request, NuMember $member)
{
    $validated = $request->validate([
        'nik'       => 'required|digits:16|unique:nu_members,nik,' . $member->id,
        'full_name' => 'required|max:255',
        'phone'     => 'required|max:20',
        'gender'    => 'required|in:L,P',
        'address'   => 'required',
    ]);

    $member->update($validated);

    return redirect()
        ->route('members.index')
        ->with('success', 'Data anggota berhasil diperbarui.');
}

public function destroy(NuMember $member)
{
    $member->delete();

    return redirect()
        ->route('members.index')
        ->with('success', 'Anggota berhasil dihapus.');
}
    /**
     * Generate a sequential card number like NU-2026-001.
     */
    private function generateCardNumber(): string
    {
        $year = now()->format('Y');

        $lastNumber = NuMember::where('member_card_no', 'like', "NU-{$year}-%")
            ->orderByDesc('member_card_no')
            ->value('member_card_no');

        $nextSequence = 1;
        if ($lastNumber) {
            $lastSequence = (int) substr($lastNumber, -3);
            $nextSequence = $lastSequence + 1;
        }

        return sprintf('NU-%s-%03d', $year, $nextSequence);
    }

    /**
     * Generate a unique transaction code.
     */
    private function generateTransactionCode(): string
    {
        do {
            $code = 'TRX-' . strtoupper(uniqid());
        } while (Payment::where('transaction_code', $code)->exists());

        return $code;
    }
    public function registerForm()
{
    return view('members-register');
}

public function register(Request $request)
{
    $validated = $request->validate([
        'nik'       => 'required|digits:16|unique:nu_members,nik',
        'full_name' => 'required|max:255',
        'phone'     => 'required|max:20',
        'gender'    => 'required|in:L,P',
        'address'   => 'required',
    ]);

    $member = NuMember::create([
        'nik'            => $validated['nik'],
        'full_name'      => $validated['full_name'],
        'phone'          => $validated['phone'],
        'gender'         => $validated['gender'],
        'address'        => $validated['address'],
        'status'         => 'pending_payment',
        'payment_status' => 'unpaid',
    ]);

    Payment::create([
        'nu_member_id'     => $member->id,
        'transaction_code' => $this->generateTransactionCode(),
        'amount'           => self::REGISTRATION_FEE,
        'payment_status'   => 'unpaid',
    ]);

    return redirect()
        ->route('members.payment-page', $member)
        ->with('success', 'Pendaftaran berhasil! Silakan lakukan pembayaran di bawah ini.');
}
public function paymentPage(NuMember $member)
{
    $payment = $member->payments()->latest()->first();

    return view('members-payment', compact('member', 'payment'));
}

public function uploadProof(Request $request, NuMember $member)
{
    $request->validate([
        'proof' => 'required|image|max:2048',
    ]);

    $payment = $member->payments()->latest()->first();

    if ($payment) {
        $path = $request->file('proof')->store('payment-proofs', 'public');
        $payment->update(['payment_proof' => $path]);
    }

    return redirect()
        ->route('members.payment-page', $member)
        ->with('success', 'Bukti transfer berhasil diunggah. Admin akan segera memverifikasi.');
}
}