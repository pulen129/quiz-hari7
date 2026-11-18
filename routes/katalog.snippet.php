<?php
// Gabungkan dengan routes/web.php; jangan membuat route /katalog dua kali.
use App\Http\Controllers\KatalogController;
use Illuminate\Support\Facades\Route;
Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
