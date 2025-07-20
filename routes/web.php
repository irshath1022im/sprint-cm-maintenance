<?php

use App\Livewire\CorrectiveMaintenance\CmShow;
use App\Livewire\Forms\CmCreate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('create_cm', CmCreate::class)->name('create_cm');
Route::get('cm/{id}', CmShow::class )->name('cm_show');
// Route::get('cm_home', CmIndex::class)->name('cm_index');
//
