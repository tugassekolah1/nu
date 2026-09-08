<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NuMember;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MemberController extends Controller
{
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
            'nik'            => 'required|digits:16|unique:nu_members,nik',
            'full_name'      => 'required|max:255',
            'phone'          => 'required|max:20',
            'gender'         => 'required|in:L,P',
            'address'        => 'required',
            'payment_option' => 'required|in:cash,unpaid',
            'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('members-photo', 'public');
        }

        $isCash = $validated['payment_option'] === 'cash';

        $member = NuMember::create([
            'nik'            => $validated['nik'],
            'full_name'      => $validated['full_name'],
            'phone'          => $validated['phone'],
            'gender'         => $validated['gender'],
            'address'        => $validated['address'],
            'photo'          => $photoPath,
            'status'         => $isCash ? 'active' : 'pending_payment',
            'payment_status' => $isCash ? 'paid' : 'unpaid',
            'member_card_no' => $isCash ? $this->generateCardNumber() : null,
        ]);

        Payment::create([
            'nu_member_id'     => $member->id,
            'transaction_code' => $this->generateTransactionCode(),
            'amount'           => self::REGISTRATION_FEE,
            'payment_status'   => $isCash ? 'paid' : 'unpaid',
        ]);

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan.');
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
            'photo'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $validated['photo'] = $request->file('photo')->store('members-photo', 'public');
        }

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(NuMember $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus.');
    }

    public function confirmPayment(NuMember $member)
    {
        if ($member->payment_status === 'paid') {
            return redirect()->route('members.index')->with('info', 'Anggota ini sudah lunas.');
        }

        $member->update([
            'payment_status' => 'paid',
            'status'         => 'active',
            'member_card_no' => $member->member_card_no ?? $this->generateCardNumber(),
        ]);

        $payment = $member->payments()->where('payment_status', 'unpaid')->latest()->first();
        if ($payment) {
            $payment->update(['payment_status' => 'paid']);
        }

        return redirect()->route('members.index')->with('success', 'Pembayaran dikonfirmasi, anggota kini aktif.');
    }

    /**
     * Cari kartu anggota berdasarkan NIK
     */
public function searchCard(Request $request)
{
    $member = null;
    $qrCode = null;

    if ($request->has('nik') && $request->nik != '') {
        $member = NuMember::where('nik', $request->nik)->first();

        // Generate QR Code jika anggota ditemukan dan sudah lunas
        if ($member && $member->payment_status === 'paid') {
            $qrData = "NIK: " . $member->nik . " | CARD: " . $member->member_card_no;
            $qrCode = QrCode::size(80)->generate($qrData);
        }
    }

    return view('members-search', compact('member', 'qrCode'));
}

    /**
     * Cetak kartu anggota
     */
    public function printCard($id)
    {
        $member = NuMember::findOrFail($id);

        if ($member->payment_status !== 'paid') {
            return back()->with('error', 'Kartu belum dapat dicetak karena status belum lunas.');
        }

        // Generate QR Code berisi NIK & Nomor Kartu
        $qrData = "NIK: " . $member->nik . " | CARD: " . $member->member_card_no;
        $qrCode = QrCode::size(90)->generate($qrData);

        return view('admin.members.print-card', compact('member', 'qrCode'));
    }

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
            'photo'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('members-photo', 'public');
        }

        $member = NuMember::create([
            'nik'            => $validated['nik'],
            'full_name'      => $validated['full_name'],
            'phone'          => $validated['phone'],
            'gender'         => $validated['gender'],
            'address'        => $validated['address'],
            'photo'          => $photoPath,
            'status'         => 'pending_payment',
            'payment_status' => 'unpaid',
        ]);

        Payment::create([
            'nu_member_id'     => $member->id,
            'transaction_code' => $this->generateTransactionCode(),
            'amount'           => self::REGISTRATION_FEE,
            'payment_status'   => 'unpaid',
        ]);

        return redirect()->route('members.payment-page', $member)->with('success', 'Pendaftaran berhasil! Silakan lakukan pembayaran di bawah ini.');
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

        return redirect()->route('members.payment-page', $member)->with('success', 'Bukti transfer berhasil diunggah. Admin akan segera memverifikasi.');
    }
}