<?php

use App\Livewire\Forms\CmCreate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('create_cm', CmCreate::class)->name('create_cm');
