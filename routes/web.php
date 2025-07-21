<?php

use App\Livewire\Admin\ItemHome;
use App\Livewire\Admin\SpareParts;
use App\Livewire\Admin\TechnicianHome;
use App\Livewire\CorrectiveMaintenance\CmIndex;
use App\Livewire\CorrectiveMaintenance\CmShow;
use App\Livewire\Forms\CmCreate;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/', CmIndex::class)->name('cmHome');
Route::get('admin/items', ItemHome::class)->name('admin_itemHome');
Route::get('admin/technician', TechnicianHome::class)->name('admin_technician');
Route::get('admin/create_cm', CmCreate::class)->name('admin_create_cm');
Route::get('admin/spare_parts', SpareParts::class)->name('admin_spare_parts');
Route::get('admin/cm/{id}', CmShow::class )->name('admin_cm_show');
// Route::get('cm_home', CmIndex::class)->name('cm_index');
//
