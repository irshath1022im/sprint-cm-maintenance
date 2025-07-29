<?php

namespace App\Livewire\Forms;

use App\Models\CmEquipmentTag;
use App\Models\MaterialRequestItems as ModelsMaterialRequestItems;
use App\Models\SparePart;
use Livewire\Attributes\Validate;
use Livewire\Attributes\On;
use Livewire\Component;

class MaterialRequestItems extends Component
{
    public $cm;
    public $equipmentSpareParts;
    public $material_request_id;


    #[On('partRequest')]
    public function partRequest($item)
    {
        $this->material_request_id = $item['id'];
    }


      #[Validate('required')]
    public $equipment_tag_id;


      #[Validate('required')]
    public $spare_part_id;


      #[Validate('required')]
    public $qty;



    public function reloadSpareParts()
    {

    }

     public function formSave()
    {

        $validated = $this->validate();

        $formData = [
            'material_request_id' => $this->material_request_id,
        ];

        $data = $validated + $formData;

        ModelsMaterialRequestItems::create($data);

        $this->resetExcept('cm','material_request_id');
        session()->flash('created', 'Spare Parts has been Added to Sub Cm');

    }



    public function formClose()
    {
        $this->dispatch('requestItemsModalClose');
    }

    public function render()
    {
         $this->equipmentSpareParts = SparePart::where('equipment_id', $this->cm->equipment_id)->get();
         $cmEquipmentTags = CmEquipmentTag::with('equipmentTag')->where('cm_number_id', $this->cm->id)->get();
        return view('livewire.forms.material-request-items',['cmEquipmentTags' => $cmEquipmentTags]);
    }
}
