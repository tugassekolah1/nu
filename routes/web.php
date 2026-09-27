<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\Admin\InfaqController as AdminInfaqController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ProfileController;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Infaq;
use App\Models\NuMember;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [BeritaController::class, 'landing'])->name('landing');

// Member Registration & Search Card
Route::get('/daftar', [MemberController::class, 'registerForm'])->name('members.register-form');
Route::post('/daftar', [MemberController::class, 'register'])->name('members.register');
Route::get('/daftar/{member}/bayar', [MemberController::class, 'paymentPage'])->name('members.payment-page');
Route::post('/daftar/{member}/bukti', [MemberController::class, 'uploadProof'])->name('members.upload-proof');

// Pencarian & Cetak Kartu Anggota (Publik)
Route::get('/cek-kartu', [MemberController::class, 'searchCard'])->name('members.search');

// Public Pages (Non-conflicting)
Route::get('/profil', [PengurusController::class, 'index'])->name('profil');
Route::get('/galeri', [GalleryController::class, 'publicIndex'])->name('galeri.index');

// Infaq
Route::get('/infaq', [InfaqController::class, 'index'])->name('infaq.index');
Route::post('/infaq', [InfaqController::class, 'store'])->name('infaq.store');
Route::get('/infaq/checkout/{kode}', [InfaqController::class, 'checkout'])->name('infaq.checkout');
Route::post('/infaq/simulate/{kode}', [InfaqController::class, 'simulatePayment'])->name('infaq.simulate');
Route::get('/infaq/success/{kode}', [InfaqController::class, 'success'])->name('infaq.success');

Route::get('/beritas', [BeritaController::class, 'index_publik'])->name('berita.public');
/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalMembers' => NuMember::count(),
        'totalNews'    => Berita::count(),
        'totalAgenda'  => Agenda::count(),
        'totalInfaq'   => Infaq::where('status', 'lunas')->sum('nominal'),
        'infaqTerbaru' => Infaq::latest()->take(5)->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('dashboard', [
        'totalMembers' => NuMember::count(),
        'totalNews'    => Berita::count(),
        'totalAgenda'  => Agenda::count(),
        'totalInfaq'   => Infaq::where('status', 'lunas')->sum('nominal'),
        'infaqTerbaru' => Infaq::latest()->take(5)->get(),
    ]);
})->middleware(['auth', 'verified'])->name('admin.dashboard');


Route::middleware(['auth'])->group(function () {
    // Infaq Management (admin only) — /admin/infaq agar tidak bentrok dengan /infaq publik
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::resource('infaq', AdminInfaqController::class)
            ->parameters(['infaq' => 'infaq'])
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::post('/infaq/{infaq}/lunas', [AdminInfaqController::class, 'markLunas'])
            ->name('infaq.mark-lunas');
    });

    // News & Gallery Management (Resource akan mendaftarkan /berita/create terlebih dahulu)
    Route::resource('berita', BeritaController::class)
        ->parameters(['berita' => 'berita'])
        ->except(['show']);
    Route::resource('gallery', GalleryController::class);

    // Members Management
    Route::resource('members', MemberController::class)
        ->parameters(['members' => 'member'])
        ->except(['show']);
    Route::patch('/members/{member}/confirm-payment', [MemberController::class, 'confirmPayment'])
        ->name('members.confirm-payment');

    // Pengurus Management
    Route::get('/pengurus', [PengurusController::class, 'adminIndex'])->name('pengurus.index');
    Route::get('/pengurus/create', [PengurusController::class, 'create'])->name('pengurus.create');
    Route::post('/pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
    Route::get('/pengurus/{pengurus}/edit', [PengurusController::class, 'edit'])->name('pengurus.edit');
    Route::put('/pengurus/{pengurus}', [PengurusController::class, 'update'])->name('pengurus.update');
    Route::delete('/pengurus/{pengurus}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');

    // Agenda Management
    Route::resource('agenda', AgendaController::class)
        ->parameters(['agenda' => 'agenda'])
        ->except(['show']);

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// DIPINDAHKAN KE PALING BAWAH agar kata 'create' tidak dimakan oleh parameter {berita:slug}
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');

require __DIR__.'/auth.php';