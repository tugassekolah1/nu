<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function publicIndex()
    {
        $upcomingAgenda = Agenda::where('event_date', '>=', today())
            ->orderBy('event_date')
            ->paginate(9)
            ->withQueryString();

        $pastAgenda = Agenda::where('event_date', '<', today())
            ->orderByDesc('event_date')
            ->take(6)
            ->get();

        return view('agenda', compact('upcomingAgenda', 'pastAgenda'));
    }

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
            'latitude'    => 'nullable|numeric|between:-90,90',
            'longitude'   => 'nullable|numeric|between:-180,180',
            'maps_url'    => 'nullable|url|max:500',
            'description' => 'nullable',
        ]);

        Agenda::create($validated);

        return redirect()
            ->route('agenda.index')
            ->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $validated = $request->validate([
            'title'       => 'required|max:255',
            'category'    => 'required|max:100',
            'event_date'  => 'required|date',
            'event_time'  => 'nullable|max:50',
            'location'    => 'nullable|max:255',
            'latitude'    => 'nullable|numeric|between:-90,90',
            'longitude'   => 'nullable|numeric|between:-180,180',
            'maps_url'    => 'nullable|url|max:500',
            'description' => 'nullable',
        ]);

        $agenda->update($validated);

        return redirect()
            ->route('agenda.index')
            ->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()
            ->route('agenda.index')
            ->with('success', 'Agenda berhasil dihapus.');
    }
}