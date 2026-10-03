<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Infaq;
use App\Models\NuMember;
use App\Models\Pengurus;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'totalMembers' => NuMember::count(),
            'totalPengurus' => Pengurus::count(),
            'totalNews' => Berita::count(),
            'totalGaleri' => Gallery::count(),
            'totalAgenda' => Agenda::count(),
            'totalInfaq' => Infaq::where('status', 'lunas')->sum('nominal'),
            'infaqTerbaru' => Infaq::latest()->take(5)->get(),
        ]);
    }
}
