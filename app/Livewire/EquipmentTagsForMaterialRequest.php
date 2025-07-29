<?php

namespace App\Livewire;

use App\Models\CmEquipmentTag;
use App\Models\EquipmentTag;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EquipmentTagsForMaterialRequest extends Component
{
    public $cm;
    public $equipmentTags;
    public $showCmNewEquipmentTagModal = false;

      #[Validate('required')]
    public $equipment_tag_id;


    public function cmEquipmentTagDelete($lineId)
    {
        // $this->lineId = $lineId;
        CmEquipmentTag::find($lineId)->delete($lineId);
        session()->flash('Deleted', 'Equipment Tag has been removed from CM');
    }

    public function updated($equipment_tag_id)
    {
        $this->validate();

        $cmTags= [
            'cm_number_id' => $this->cm->id,
            'equipment_tag_id' => $this->equipment_tag_id
        ];

        $lastUpdate =CmEquipmentTag::updateOrCreate($cmTags);
          session()->flash('created', 'Equipment Tag has been added to CM');
        // dd($lastUpdate);
    }



    public function render()
    {
        $result = CmEquipmentTag::where('cm_number_id', $this->cm->id)->with('equipmentTag')->get();
        return view('livewire.equipment-tags-for-material-request',['cmEquipmentTags' => $result]);
    }


}
