<?php

namespace App\Livewire\Admin;

use App\Models\EquipmentTag;
use Livewire\Component;

class EquipmentTagShow extends Component
{
    public $id;

    public function render()
    {

        $result = EquipmentTag::with(['cmRequests' => function($q){
            return $q->with('serviceRequest');
        },'equipment', 'serviceRequests'])->findOrFail($this->id);
        return view('livewire.admin.equipment-tag-show',['tag' => $result])
            ->extends('components.layouts.app');
    }
}
