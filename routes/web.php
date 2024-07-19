<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReparationControlleur;
use App\Http\Controllers\ClientControlleur;

Route::get('/', [ReparationControlleur::class, 'index'])->name('index');

Route::post('/clients', [ClientControlleur::class, 'store'])->name('index.store');

