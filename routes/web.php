<?php

use App\Http\Controllers\AdminController; // <--- Ditambahkan
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrganisationController; // <--- Ditambahkan agar struktur route tidak error
use App\Http\Controllers\ProfileController;
use App\Models\Berita;
use App\Models\NuMember;
use Illuminate\Support\Facades\Route;

// Halaman Landing / Utama
Route::get('/', [BeritaController::class, 'landing'])->name('landing');

// Halaman Pendaftaran Member (Public)
Route::get('/daftar', [MemberController::class, 'registerForm'])->name('members.register-form');
Route::post('/daftar', [MemberController::class, 'register'])->name('members.register');
Route::get('/daftar/{member}/bayar', [MemberController::class, 'paymentPage'])->name('members.payment-page');
Route::post('/daftar/{member}/bukti', [MemberController::class, 'uploadProof'])->name('members.upload-proof');

// GRUP ROUTE ADMIN (Ditambahkan untuk menyediakan route admin.dashboard & admin.news)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('news', BeritaController::class);
});

// Dashboard User Biasa
Route::get('/dashboard', function () {
    return view('dashboard' , [
        'totalMembers' => NuMember::count(),
        'totalNews'    => Berita::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Route User Terautentikasi (CRUD Berita & Member)
Route::middleware(['auth'])->group(function () {
    Route::resource('berita', BeritaController::class)
        ->parameters(['berita' => 'berita'])
        ->except(['show']);

    Route::resource('members', MemberController::class)
        ->parameters(['members' => 'member'])
        ->except(['show']);

    Route::patch('/members/{member}/confirm-payment', [MemberController::class, 'confirmPayment'])
        ->name('members.confirm-payment');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route publik dengan wildcard {slug} HARUS di paling bawah,
// supaya tidak "menyerobot" route lain yang punya segmen tetap seperti /berita/create
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/{slug}/struktur', [OrganisationController::class, 'structure'])->name('organisation.structure');

require __DIR__.'/auth.php';