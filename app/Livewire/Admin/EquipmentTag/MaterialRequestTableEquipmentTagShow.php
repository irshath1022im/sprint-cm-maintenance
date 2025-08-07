<?php

namespace App\Livewire\Admin\EquipmentTag;

use App\Models\EquipmentTag;
use Livewire\Component;

class MaterialRequestTableEquipmentTagShow extends Component
{

    public $tag;


    public function render()
    {
        $result = EquipmentTag::find($this->tag);
        return view('livewire.admin.equipment-tag.material-request-table-equipment-tag-show',['equipmentTag' => $result]);
    }
}
