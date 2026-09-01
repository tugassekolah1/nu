<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ProfileController;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Infaq;
use App\Models\NuMember;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

Route::get('/', [BeritaController::class, 'landing'])->name('landing');

Route::get('/daftar', [MemberController::class, 'registerForm'])->name('members.register-form');
Route::post('/daftar', [MemberController::class, 'register'])->name('members.register');
Route::get('/daftar/{member}/bayar', [MemberController::class, 'paymentPage'])->name('members.payment-page');
Route::post('/daftar/{member}/bukti', [MemberController::class, 'uploadProof'])->name('members.upload-proof');

Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalMembers' => NuMember::count(),
        'totalNews'    => Berita::count(),
        'totalAgenda'  => Agenda::count(),
        'totalInfaq'   => Infaq::where('status', 'lunas')->sum('nominal'),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('berita', BeritaController::class)
        ->parameters(['berita' => 'berita'])
        ->except(['show']);
Route::resource('gallery', GalleryController::class);
    Route::resource('members', MemberController::class)
        ->parameters(['members' => 'member'])
        ->except(['show']);
Route::get('/pengurus', [PengurusController::class, 'adminIndex'])->name('pengurus.index');
    Route::get('/pengurus/create', [PengurusController::class, 'create'])->name('pengurus.create');
    Route::post('/pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
    Route::get('/pengurus/{pengurus}/edit', [PengurusController::class, 'edit'])->name('pengurus.edit');
    Route::put('/pengurus/{pengurus}', [PengurusController::class, 'update'])->name('pengurus.update');
    Route::delete('/pengurus/{pengurus}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');
    Route::patch('/members/{member}/confirm-payment', [MemberController::class, 'confirmPayment'])
        ->name('members.confirm-payment');

    Route::resource('agenda', AgendaController::class)
        ->parameters(['agenda' => 'agenda'])
        ->except(['show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/infaq', [InfaqController::class, 'index'])->name('infaq.index');
Route::post('/infaq', [InfaqController::class, 'store'])->name('infaq.store');
Route::get('/infaq/checkout/{kode}', [InfaqController::class, 'checkout'])->name('infaq.checkout');
Route::post('/infaq/simulate/{kode}', [InfaqController::class, 'simulatePayment'])->name('infaq.simulate');
Route::get('/infaq/success/{kode}', [InfaqController::class, 'success'])->name('infaq.success');
Route::get('/profil', function () {
    return view('profil');
})->name('profil');
Route::get('/galeri', [GalleryController::class, 'publicIndex'])->name('galeri.index');
Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus.index');
require __DIR__.'/auth.php';