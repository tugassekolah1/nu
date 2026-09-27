<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infaq;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class InfaqController extends Controller
{
    /**
     * Daftar transaksi infaq + rekap total, dengan filter status dan pencarian.
     */
    public function index(Request $request)
    {
        $q = (string) $request->query('q', '');
        $status = $request->query('status');

        $infaqs = Infaq::query()
            ->when(trim($q) !== '', function (Builder $query) use ($q) {
                $like = '%'.trim($q).'%';

                $query->where(function (Builder $query) use ($like) {
                    $query->where('kode_transaksi', 'like', $like)
                        ->orWhere('nama_donatur', 'like', $like)
                        ->orWhere('no_hp', 'like', $like);
                });
            })
            ->when(in_array($status, Infaq::STATUSES, true), fn (Builder $query) => $query->where('status', $status))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $rekap = [
            'total_lunas' => Infaq::where('status', 'lunas')->sum('nominal'),
            'hari_ini' => Infaq::where('status', 'lunas')->whereDate('paid_at', today())->sum('nominal'),
            'bulan_ini' => Infaq::where('status', 'lunas')
                ->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])
                ->sum('nominal'),
            'pending' => Infaq::where('status', 'pending')->count(),
        ];

        return view('admin.infaq.index', [
            'infaqs' => $infaqs,
            'rekap' => $rekap,
            'q' => $q,
            'status' => in_array($status, Infaq::STATUSES, true) ? $status : null,
        ]);
    }

    public function create()
    {
        return view('admin.infaq.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateTransaksi($request);

        $validated['kode_transaksi'] = $this->generateKode();
        $validated['nama_donatur'] = ($validated['nama_donatur'] ?? '') ?: 'Hamba Allah';
        $validated['status'] = $validated['status'] ?? 'pending';
        $validated['paid_at'] = $this->resolvePaidAt($validated['status'], $validated['paid_at'] ?? null);

        Infaq::create($validated);

        return redirect()->route('admin.infaq.index')->with('success', 'Transaksi infaq berhasil dicatat');
    }

    public function edit(Infaq $infaq)
    {
        return view('admin.infaq.edit', compact('infaq'));
    }

    public function update(Request $request, Infaq $infaq)
    {
        $validated = $this->validateTransaksi($request);

        $validated['nama_donatur'] = ($validated['nama_donatur'] ?? '') ?: 'Hamba Allah';
        $validated['status'] = $validated['status'] ?? 'pending';
        $validated['paid_at'] = $this->resolvePaidAt($validated['status'], $validated['paid_at'] ?? null);

        $infaq->update($validated);

        return redirect()->route('admin.infaq.index')->with('success', 'Transaksi infaq diperbarui');
    }

    public function destroy(Infaq $infaq)
    {
        $infaq->delete();

        return redirect()->route('admin.infaq.index')->with('success', 'Transaksi infaq dihapus');
    }

    /**
     * Tandai transaksi pending menjadi lunas.
     */
    public function markLunas(Infaq $infaq)
    {
        if ($infaq->status === 'lunas') {
            return redirect()->back()->with('success', 'Transaksi ini sudah lunas.');
        }

        if ($infaq->status !== 'pending') {
            return redirect()->back()->with('error', 'Hanya transaksi berstatus pending yang bisa ditandai lunas.');
        }

        $infaq->update([
            'status' => 'lunas',
            'paid_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Transaksi ditandai lunas');
    }

    /**
     * Aturan validasi untuk store dan update.
     */
    private function validateTransaksi(Request $request): array
    {
        return $request->validate([
            'nominal' => 'required|numeric|min:1',
            'metode_pembayaran' => ['required', Rule::in(Infaq::METODE)],
            'nama_donatur' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'status' => ['nullable', Rule::in(Infaq::STATUSES)],
            'paid_at' => 'nullable|date',
            'catatan' => 'nullable|string',
        ], [
            'nominal.required' => 'Nominal wajib diisi.',
            'nominal.numeric' => 'Nominal harus berupa angka.',
            'nominal.min' => 'Nominal minimal Rp 1.',
            'metode_pembayaran.required' => 'Metode pembayaran wajib dipilih.',
            'metode_pembayaran.in' => 'Metode pembayaran tidak dikenali.',
            'status.in' => 'Status transaksi tidak dikenali.',
            'paid_at.date' => 'Tanggal bayar tidak valid.',
        ]);
    }

    /**
     * paid_at hanya berlaku untuk status lunas; jika kosong, pakai waktu sekarang.
     */
    private function resolvePaidAt(string $status, $paidAt = null)
    {
        if ($status !== 'lunas') {
            return null;
        }

        return $paidAt ?: now();
    }

    private function generateKode(): string
    {
        do {
            $kode = 'INF-'.strtoupper(Str::random(8));
        } while (Infaq::where('kode_transaksi', $kode)->exists());

        return $kode;
    }
}
