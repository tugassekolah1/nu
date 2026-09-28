<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    // Halaman Utama Frontend
    public function index()
    {
        $pengurus = Pengurus::orderBy('urutan', 'asc')->orderBy('id', 'asc')->get();

        $urutanBanom = ['ranting', 'ipnu', 'ippnu', 'ansor', 'fatayat', 'muslimat', 'banser'];
        $labelCadangan = [
            'ranting' => 'Ranting NU',
            'ipnu' => 'PR IPNU',
            'ippnu' => 'PR IPPNU',
            'ansor' => 'GP Ansor',
            'fatayat' => 'Fatayat NU',
            'muslimat' => 'Muslimat NU',
            'banser' => 'Banser',
        ];

        $sections = $pengurus
            ->groupBy('banom')
            ->map(function ($items, $slug) use ($labelCadangan) {
                $label = $items->groupBy('label_banom')
                    ->sortByDesc(fn ($group) => $group->count())
                    ->keys()
                    ->first() ?: ($labelCadangan[$slug] ?? $slug);

                return [
                    'slug' => $slug,
                    'label' => $label,
                    'jumlah' => $items->count(),
                    'items' => $items->values(),
                ];
            })
            ->sortBy(fn ($section) => ($index = array_search($section['slug'], $urutanBanom, true)) === false
                ? count($urutanBanom)
                : $index)
            ->values();

        return view('profil', [
            'sections' => $sections,
            'totalPengurus' => $pengurus->count(),
        ]);
    }

    // Dashboard Admin - List Data
    public function adminIndex()
    {
        $pengurus = Pengurus::orderBy('urutan', 'asc')->get();

        return view('pengurus.index', compact('pengurus'));
    }

    // Form Tambah
    public function create()
    {
        return view('pengurus.create');
    }

    // Store Data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'banom' => 'required|string',
            'label_banom' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'urutan' => 'nullable|numeric',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pengurus', 'public');
        }

        Pengurus::create($validated);

        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil ditambahkan.');
    }

    // Form Edit
    public function edit(Pengurus $pengurus)
    {
        return view('pengurus.edit', compact('pengurus'));
    }

    // Update Data
    public function update(Request $request, Pengurus $pengurus)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'banom' => 'required|string',
            'label_banom' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'urutan' => 'nullable|numeric',
        ]);

        if ($request->hasFile('foto')) {
            if ($pengurus->foto) {
                Storage::disk('public')->delete($pengurus->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pengurus', 'public');
        }

        $pengurus->update($validated);

        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil diperbarui.');
    }

    // Hapus Data
    public function destroy(Pengurus $pengurus)
    {
        if ($pengurus->foto) {
            Storage::disk('public')->delete($pengurus->foto);
        }
        $pengurus->delete();

        return redirect()->route('pengurus.index')->with('success', 'Data pengurus berhasil dihapus.');
    }
}
