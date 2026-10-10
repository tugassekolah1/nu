<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Infaq;
use App\Models\NuMember;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $statusFilter = $request->query('status', 'all');
        if (! in_array($statusFilter, ['all', 'pending', 'approved'], true)) {
            $statusFilter = 'all';
        }
        $state = $statusFilter === 'approved' ? 'accepted' : $statusFilter;

        $filtered = fn () => NuMember::notRejected()
            ->when($statusFilter !== 'all', fn ($q) => $q->withRegistrationState($state));

        $membersPerOrganisasi = $filtered()
            ->selectRaw('organisasi, COUNT(*) as total')
            ->groupBy('organisasi')
            ->pluck('total', 'organisasi');

        // Rincian menunggu vs disetujui per banom (untuk mode "Semua").
        $pendingPerOrganisasi = NuMember::notRejected()->withRegistrationState('pending')
            ->selectRaw('organisasi, COUNT(*) as total')
            ->groupBy('organisasi')
            ->pluck('total', 'organisasi');
        $approvedPerOrganisasi = NuMember::notRejected()->withRegistrationState('accepted')
            ->selectRaw('organisasi, COUNT(*) as total')
            ->groupBy('organisasi')
            ->pluck('total', 'organisasi');

        return view('dashboard', [
            'totalMembers' => NuMember::count(),
            'totalPengurus' => Pengurus::count(),
            'totalNews' => Berita::count(),
            'totalNewsViews' => (int) Berita::sum('views'),
            'totalGaleri' => Gallery::count(),
            'totalAgenda' => Agenda::count(),
            'totalInfaq' => Infaq::where('status', 'lunas')->sum('nominal'),
            'infaqTerbaru' => Infaq::latest()->take(5)->get(),
            'statusFilter' => $statusFilter,
            'pendingCount' => NuMember::withRegistrationState('pending')->count(),
            'approvedCount' => NuMember::withRegistrationState('accepted')->count(),
            'membersPerOrganisasi' => $membersPerOrganisasi,
            'pendingPerOrganisasi' => $pendingPerOrganisasi,
            'approvedPerOrganisasi' => $approvedPerOrganisasi,
            'membersTanpaOrganisasi' => $filtered()->whereNull('organisasi')->count(),
        ]);
    }
}
