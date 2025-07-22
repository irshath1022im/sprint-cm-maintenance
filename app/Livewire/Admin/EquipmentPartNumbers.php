<?php

namespace App\Livewire\Admin;

use App\Models\EquipmentPartNumber;
use Livewire\Component;

class EquipmentPartNumbers extends Component
{
    public function render()
    {
        $result = EquipmentPartNumber::with('equipment')->paginate(20);
        return view('livewire.admin.equipment-part-numbers',['part_numbers' => $result])
                ->extends('components.layouts.app')
                ;
    }
}
