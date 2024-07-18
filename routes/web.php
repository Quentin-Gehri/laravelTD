<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReparationControlleur;

Route::get('/', [ReparationControlleur::class, 'index']);


