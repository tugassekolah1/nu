<?php

namespace App\Http/Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class OrganisationController extends Controller
{
    public function index()
    {
        $organisations = Organisation::latest()->paginate(10);
        return view('admin.organisations.index', compact('organisations'));
    }

    public function create()
    {
        return view('admin.organisations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('organisations', 'public');
        }

        Organisation::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'logo' => $logoPath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.organisations.index')->with('success', 'Organisasi berhasil ditambahkan.');
    }

    public function edit(Organisation $organisation)
    {
        return view('admin.organisations.edit', compact('organisation'));
    }

    public function update(Request $request, Organisation $organisation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $logoPath = $organisation->logo;
        if ($request->hasFile('logo')) {
            if ($organisation->logo) {
                Storage::disk('public')->delete($organisation->logo);
            }
            $logoPath = $request->file('logo')->store('organisations', 'public');
        }

        $organisation->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'logo' => $logoPath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.organisations.index')->with('success', 'Organisasi berhasil diperbarui.');
    }

    public function destroy(Organisation $organisation)
    {
        if ($organisation->logo) {
            Storage::disk('public')->delete($organisation->logo);
        }
        $organisation->delete();

        return redirect()->route('admin.organisations.index')->with('success', 'Organisasi berhasil dihapus.');
    }
}