<?php

namespace App\Livewire\Forms;

use App\Livewire\Admin\SpareParts;
use App\Models\CmEquipmentTag;
use App\Models\EquipmentTag;
use App\Models\SparePart;
use App\Models\MaterialRequest;
use App\Models\MeterialRequest;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewMaterialRequestForm extends Component
{
    public $cm; // getting from parts-replacement-card
    public $equipmentTags;
    public $equipmentSpareParts;

    public $SelectedEquipmentTags = [];

    #[Validate('required')]
    public $sub_cm;


    #[Validate('required')]
    public $date;

     #[Validate('required')]
    public $expected_date;

      #[Validate('required')]
    public $equipment_tag_id;


      #[Validate('required')]
    public $qty;


    public $remark;



    public function updated($equipment_tag_id)
    {
        // $this->SelectedEquipmentTags[] = $this->equipmentTags[$this->equipment_tag_id];
        $cmTags= [
            'cm_number_id' => $this->cm->id,
            'equipment_tag_id' => $this->equipment_tag_id
        ];

        CmEquipmentTag::create($cmTags);
    }


     public function formSave()
    {
        $validated = $this->validate();

        $formData = [
            'cm_number_id' => $this->cm->id,
            'equipment_id' => $this->cm->equipment_id,
            // 'equipment_tag_id' => $this->cm->equipment_tag_id,
            'status' => null,
            'remarks'=> null
        ];

        $data = $validated + $formData;

        MaterialRequest::create($data);


        // $result= SparePart::create($validated);
        $this->resetExcept('cm','equipments');
        session()->flash('created', 'Material Request has been added to CM');

        //add the spare parts to spare part table


        //assign this part to cm for next usage

    }

    public function formClose()
    {

    $this->dispatch('newMaterialRequestFormClose');
    $this->resetExcept('cm','equipments');
    $this->resetErrorBag();

    }

    public function mount($cm)
    {
        $this->equipmentTags = EquipmentTag::where('equipment_id', $cm->equipment_id)->get();
    }

    public function render()
    {

        $this->equipmentSpareParts = SparePart::where('equipment_id', $this->cm->equipment_id)->get();
        $cmEquipmentTags = CmEquipmentTag::with('equipmentTag')->where('cm_number_id', $this->cm->id)->get();
        return view('livewire.forms.new-material-request-form',['cmEquipmentTags' => $cmEquipmentTags]);
    }
}
