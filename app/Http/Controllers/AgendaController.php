<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendaList = Agenda::orderBy('event_date')->paginate(10);

        return view('admin.agenda.index', compact('agendaList'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'category'    => 'required|max:100',
            'event_date'  => 'required|date',
            'event_time'  => 'nullable|max:50',
            'location'    => 'nullable|max:255',
            'description' => 'nullable',
        ]);

        Agenda::create($validated);

        return redirect()
            ->route('agenda.index')
            ->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit(Agenda $agendum)
    {
        return view('admin.agenda.edit', ['agenda' => $agendum]);
    }

    public function update(Request $request, Agenda $agendum)
    {
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'category'    => 'required|max:100',
            'event_date'  => 'required|date',
            'event_time'  => 'nullable|max:50',
            'location'    => 'nullable|max:255',
            'description' => 'nullable',
        ]);

        $agendum->update($validated);

        return redirect()
            ->route('agenda.index')
            ->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agendum)
    {
        $agendum->delete();

        return redirect()
            ->route('agenda.index')
            ->with('success', 'Agenda berhasil dihapus.');
    }
}