<?php

namespace App\Livewire\Admin\EquipmentShow;

use Livewire\Component;

class MaterialRequest extends Component
{

    public $materialRequestItems;
    
    public function render()
    {
        return view('livewire.admin.equipment-show.material-request');
    }
}
