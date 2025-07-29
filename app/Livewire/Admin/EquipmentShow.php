<?php

namespace App\Livewire\Admin;

use App\Models\Equipment;
use Livewire\Component;

class EquipmentShow extends Component
{
    public $id;

    public function render()
    {

        $result = Equipment::with('tags','materialRequest')->findOrfail($this->id);
        return view('livewire.admin.equipment-show',['equipment' => $result])
                ->extends('components.layouts.app');
    }
}
