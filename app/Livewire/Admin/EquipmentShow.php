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

        $result = Equipment::with(['tags','materialRequest','materialRequestItems'=> function($q){
            return $q->with(['equipmentTag' => function($q1){
                return $q1->with('equipment');
            },'sparePart','materialRequest'=>function($q2){
                return $q2->with('cm');
            }]);
        }])->findOrfail($this->id);
        return view('livewire.admin.equipment-show',['equipment' => $result])
                ->extends('components.layouts.app');
    }
}
