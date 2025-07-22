<?php

namespace App\Livewire\Admin;

use App\Models\EquipmentTag;
use Livewire\Component;

class EquipmentTags extends Component
{
    public function render()
    {
        $result = EquipmentTag::with('equipment')->paginate(20);
        return view('livewire.admin.equipment-tags',['tags' => $result])
            ->extends('components.layouts.app')
        ;
    }
}
