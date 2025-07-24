<?php

use App\Livewire\Admin\EquipmentHome;
use App\Livewire\Admin\EquipmentShow;
use App\Livewire\Admin\EquipmentTags;
use App\Livewire\Admin\EquipmentTagShow;
use App\Livewire\Admin\MaterialRequest;
use App\Livewire\Admin\MaterialRequestHome;
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
Route::get('admin/technician', TechnicianHome::class)->name('admin_technician');
Route::get('admin/equipment', EquipmentHome::class)->name('admin_equipment');
Route::get('admin/equipment/{id}', EquipmentShow::class)->name('admin_equipment_show');
Route::get('admin/equipment_tag', EquipmentTags::class)->name('admin_tags');
Route::get('admin/equipment_tag/{id}', EquipmentTagShow::class)->name('admin_tag_show');
Route::get('admin/create_cm', CmCreate::class)->name('admin_create_cm');
Route::get('admin/spare_parts', SpareParts::class)->name('admin_spare_parts');
Route::get('admin/cm/{id}', CmShow::class )->name('admin_cm_show');
Route::get('admin/meterial_request', MaterialRequestHome::class )->name('admin_meterial_request');
// Route::get('cm_home', CmIndex::class)->name('cm_index');
//
