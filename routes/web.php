<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Models\Umkm;

Route::get('/', function () {
    $umkms = Umkm::with(['kabkota', 'kategoriUmkm', 'pembina'])->get();
    return view('welcome', compact('umkms'));
});
