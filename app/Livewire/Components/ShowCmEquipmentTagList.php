<?php

namespace App\Livewire\Components;

use App\Models\CmEquipmentTag;
use Livewire\Component;

class ShowCmEquipmentTagList extends Component
{

    public $tags;
    public $lineId;

    public function cmEquipmentTagDelete($lineId)
    {
        // $this->lineId = $lineId;
        CmEquipmentTag::find($lineId)->delete($lineId);
        session()->flash('Deleted', 'Equipment Tag has been removed from CM');
    }

    public function render()
    {
        return view('livewire.components.show-cm-equipment-tag-list');
    }
}
