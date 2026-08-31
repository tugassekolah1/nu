<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'status' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);
        $validated['user_id'] = auth()->id();

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($validated);
        return redirect()->route('berita.index')->with('success', 'Berita ditambahkan');
    }
// BeritaController.php
public function show(Berita $berita)
{
    abort_if(!$berita->status, 404); // draft gak boleh diakses publik

    return view('berita-detail', compact('berita'));
}
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'status' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($validated);
        return redirect()->route('berita.index')->with('success', 'Berita diperbarui');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita dihapus');
    }
    public function landing()
{
    $newsList = Berita::where('status', true)
        ->latest()
        ->paginate(6);

    return view('welcome', compact('newsList'));
}
}