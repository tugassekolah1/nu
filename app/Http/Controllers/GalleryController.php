<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function publicIndex()
    {
        $galleries = Gallery::orderBy('urutan', 'asc')->orderBy('created_at', 'desc')->get();

        return view('galeri', compact('galleries'));
    }

    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $galleries = Gallery::query()
            ->when($q !== '', function (Builder $query) use ($q) {
                $like = '%'.$q.'%';
                $query->where(function (Builder $query) use ($like) {
                    $query->where('judul', 'like', $like)
                        ->orWhere('deskripsi', 'like', $like);
                });
            })
            ->orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('gallery.index', compact('galleries', 'q'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        $fotoPath = $request->file('foto')->store('galleries', 'public');

        Gallery::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'urutan' => $request->urutan ?? 0,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        $fotoPath = $gallery->foto;

        if ($request->hasFile('foto')) {
            if ($gallery->foto && Storage::disk('public')->exists($gallery->foto)) {
                Storage::disk('public')->delete($gallery->foto);
            }
            $fotoPath = $request->file('foto')->store('galleries', 'public');
        }

        $gallery->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'urutan' => $request->urutan ?? 0,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->foto && Storage::disk('public')->exists($gallery->foto)) {
            Storage::disk('public')->delete($gallery->foto);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
