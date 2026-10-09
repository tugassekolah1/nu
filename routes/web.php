<?php

use App\Http\Controllers\Admin\AspirasiController as AdminAspirasiController;
use App\Http\Controllers\Admin\InfaqController as AdminInfaqController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ProfileController;
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

// Kartu Anggota — halaman utama gabungan: cek status pengajuan + preview/cetak/download kartu
Route::get('/kartu-anggota', [MemberController::class, 'memberCard'])->name('members.card');

// Pencarian & Cetak Kartu Anggota (Publik) — RUTE LAMA, diarahkan ke /kartu-anggota
Route::get('/cek-kartu', [MemberController::class, 'searchCard'])->name('members.search');

// Cek Status Pendaftaran Anggota (Publik) — RUTE LAMA, diarahkan ke /kartu-anggota
Route::get('/cek-status', [MemberController::class, 'statusCheck'])->name('members.status-check');

// Public Pages (Non-conflicting)
Route::get('/profil', [PengurusController::class, 'index'])->name('profil');
Route::get('/galeri', [GalleryController::class, 'publicIndex'])->name('galeri.index');
Route::get('/agenda', [AgendaController::class, 'publicIndex'])->name('agenda.public');

// Infaq
Route::get('/infaq', [InfaqController::class, 'index'])->name('infaq.index');
Route::post('/infaq', [InfaqController::class, 'store'])->name('infaq.store');
Route::get('/infaq/checkout/{kode}', [InfaqController::class, 'checkout'])->name('infaq.checkout');
Route::post('/infaq/simulate/{kode}', [InfaqController::class, 'simulatePayment'])->name('infaq.simulate');
Route::get('/infaq/success/{kode}', [InfaqController::class, 'success'])->name('infaq.success');

Route::get('/berita', [BeritaController::class, 'index_publik'])->name('berita.public');

// Kotak Aspirasi (publik)
Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
Route::post('/aspirasi', [AspirasiController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('aspirasi.store');
/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::redirect('/admin/dashboard', '/dashboard')->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Infaq Management (admin only) — /admin/infaq agar tidak bentrok dengan /infaq publik
    Route::prefix('admin')->name('admin.')->group(function () {
        // Permintaan Pendaftaran Anggota (terima/tolak)
        Route::get('/members/requests', [MemberController::class, 'registrationRequests'])
            ->name('members.requests');
        Route::patch('/members/requests/{member}/accept', [MemberController::class, 'acceptRegistration'])
            ->name('members.requests.accept');
        Route::patch('/members/requests/{member}/reject', [MemberController::class, 'rejectRegistration'])
            ->name('members.requests.reject');

        Route::resource('infaq', AdminInfaqController::class)
            ->parameters(['infaq' => 'infaq'])
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::post('/infaq/{infaq}/lunas', [AdminInfaqController::class, 'markLunas'])
            ->name('infaq.mark-lunas');

        // Kotak Aspirasi (admin only)
        Route::resource('aspirasi', AdminAspirasiController::class)
            ->parameters(['aspirasi' => 'aspirasi'])
            ->only(['index', 'edit', 'update', 'destroy']);
    });

    // News & Gallery Management (Resource akan mendaftarkan /berita/create terlebih dahulu)
    Route::resource('admin/berita', BeritaController::class)
        ->parameters(['berita' => 'berita'])
        ->except(['show']);
    Route::resource('gallery', GalleryController::class);

    // Members Management
    Route::resource('members', MemberController::class)
        ->parameters(['members' => 'member'])
        ->except(['show']);
    Route::patch('/members/{member}/confirm-payment', [MemberController::class, 'confirmPayment'])
        ->name('members.confirm-payment');
    Route::get('/members/{member}/print-card', [MemberController::class, 'printCard'])
        ->name('members.print-card');

    // Pengurus Management
    Route::get('/pengurus', [PengurusController::class, 'adminIndex'])->name('pengurus.index');
    Route::get('/pengurus/create', [PengurusController::class, 'create'])->name('pengurus.create');
    Route::post('/pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
    Route::get('/pengurus/{pengurus}/edit', [PengurusController::class, 'edit'])->name('pengurus.edit');
    Route::put('/pengurus/{pengurus}', [PengurusController::class, 'update'])->name('pengurus.update');
    Route::delete('/pengurus/{pengurus}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');

    // Agenda Management (URL /admin/agenda — halaman publik memakai /agenda)
    Route::prefix('admin')->group(function () {
        Route::resource('agenda', AgendaController::class)
            ->parameters(['agenda' => 'agenda'])
            ->except(['show']);
    });
});

Route::middleware(['auth'])->group(function () {
    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// DIPINDAHKAN KE PALING BAWAH agar kata 'create' tidak dimakan oleh parameter {berita:slug}
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');

require __DIR__.'/auth.php';
