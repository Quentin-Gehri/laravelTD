<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReparationControlleur;
use App\Http\Controllers\ClientControlleur;

Route::get('/', [ReparationControlleur::class, 'index'])->name('index');

Route::post('/clients', [ClientControlleur::class, 'store'])->name('clients.store');

Route::post('/reparations', [ReparationControlleur::class, 'store'])->name('reparations.store');

Route::put('/reparations/update/{id}', [ReparationControlleur::class, 'update'])->name('reparations.update');

Route::post('/reparations/filter', [ReparationControlleur::class, 'filter'])->name('reparations.filter');
