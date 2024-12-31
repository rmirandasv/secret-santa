<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Pages\SecretSanta\JoinSecretSanta;
use App\Livewire\Pages\SecretSanta\ShowSecretSanta;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/secret-santa/{group:slug}', ShowSecretSanta::class)->name('secret-santa.show');
Route::get('/secret-santa/{group:slug}/join', JoinSecretSanta::class)->name('secret-santa.join');

Route::view('/about', 'about')->name('about');
