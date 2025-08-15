<?php

namespace App\Livewire\Admin;

use App\Models\Equipment;
use Livewire\Component;

class EquipmentHome extends Component
{
    public $equipmentSearch;



    public function render()
    {
         $result = Equipment::when($this->equipmentSearch, function($q){
                            return $q->where('equipment', 'LIKE', trim($this->equipmentSearch).'%');
                        })
                        ->with('tags')
                        ->get();
        return view('livewire.admin.equipment-home',['equipment' => $result])
            ->extends('components.layouts.app');
    }
}
