<?php

namespace App\Livewire\Admin;

use App\Models\Equipment;
use Livewire\Component;
use Livewire\WithPagination;

class EquipmentShow extends Component
{
    public $id;
    use WithPagination;

    public function render()
    {

        $result = Equipment::with([
                    'tags',
                    'materialRequest',
                    'cmRequests'=> function ($q){ return $q->with([
                                                    'cmStatus' => function($q) { return $q->with('taskStatus');}]
                    );}
                    ])
                            ->findOrfail($this->id);
        return view('livewire.admin.equipment-show',['equipment' => $result])
                ->extends('components.layouts.app');
    }
}
