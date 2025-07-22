<?php

namespace App\Livewire\Admin;

use App\Models\Equipment;
use Livewire\Component;

class EquipmentHome extends Component
{
    public function render()
    {
         $result = Equipment::paginate(20);
        return view('livewire.admin.equipment-home',['equipment' => $result])
            ->extends('components.layouts.app');
    }
}
