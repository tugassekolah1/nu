<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Infaq;
use App\Models\NuMember;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $statusFilter = $request->query('status', 'all');
        if (! in_array($statusFilter, ['all', 'pending', 'approved'], true)) {
            $statusFilter = 'all';
        }

        // Agregat NuMember: total, pending, accepted, tanpa organisasi dalam 1 query
        $memberStats = DB::table('nu_members')
            ->selectRaw("
                COUNT(*) as total,
                SUM(CASE WHEN registration_status = 'pending' OR (registration_status IS NULL AND status != 'active') THEN 1 ELSE 0 END) as pending_count,
                SUM(CASE WHEN registration_status = 'accepted' OR (registration_status IS NULL AND status = 'active') THEN 1 ELSE 0 END) as approved_count,
                SUM(CASE WHEN organisasi IS NULL THEN 1 ELSE 0 END) as without_org
            ")
            ->where(function ($query) {
                $query->whereNull('registration_status')
                    ->orWhere('registration_status', '!=', 'rejected');
            })
            ->first();

        // Per organisasi aggregation dalam 1 query dengan conditional
        $memberAggregates = DB::table('nu_members')
            ->selectRaw("
                organisasi,
                COUNT(*) as total,
                SUM(CASE WHEN registration_status = 'pending' OR (registration_status IS NULL AND status != 'active') THEN 1 ELSE 0 END) as pending_count,
                SUM(CASE WHEN registration_status = 'accepted' OR (registration_status IS NULL AND status = 'active') THEN 1 ELSE 0 END) as approved_count
            ")
            ->where(function ($query) {
                $query->whereNull('registration_status')
                    ->orWhere('registration_status', '!=', 'rejected');
            })
            ->groupBy('organisasi')
            ->get()
            ->keyBy('organisasi');

        // Extract masing-masing organisasi breakdown
        $membersPerOrganisasi = $memberAggregates->mapWithKeys(fn ($item) => [$item->organisasi => $item->total]);
        $pendingPerOrganisasi = $memberAggregates->mapWithKeys(fn ($item) => [$item->organisasi => $item->pending_count]);
        $approvedPerOrganisasi = $memberAggregates->mapWithKeys(fn ($item) => [$item->organisasi => $item->approved_count]);

        // Agregat tabel lain (non-member) dalam 1 query per tabel
        $otherStats = [
            'totalPengurus' => Pengurus::count(),
            'totalNews' => Berita::count(),
            'totalNewsViews' => (int) Berita::sum('views'),
            'totalGaleri' => Gallery::count(),
            'totalAgenda' => Agenda::count(),
            'totalInfaq' => Infaq::where('status', 'lunas')->sum('nominal'),
            'infaqTerbaru' => Infaq::latest()->take(5)->get(),
        ];

        return view('dashboard', [
            'totalMembers' => $memberStats->total,
            'totalPengurus' => $otherStats['totalPengurus'],
            'totalNews' => $otherStats['totalNews'],
            'totalNewsViews' => $otherStats['totalNewsViews'],
            'totalGaleri' => $otherStats['totalGaleri'],
            'totalAgenda' => $otherStats['totalAgenda'],
            'totalInfaq' => $otherStats['totalInfaq'],
            'infaqTerbaru' => $otherStats['infaqTerbaru'],
            'statusFilter' => $statusFilter,
            'pendingCount' => $memberStats->pending_count,
            'approvedCount' => $memberStats->approved_count,
            'membersPerOrganisasi' => $membersPerOrganisasi,
            'pendingPerOrganisasi' => $pendingPerOrganisasi,
            'approvedPerOrganisasi' => $approvedPerOrganisasi,
            'membersTanpaOrganisasi' => $memberStats->without_org,
        ]);
    }
}
