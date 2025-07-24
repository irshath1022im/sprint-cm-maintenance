<?php

namespace App\Livewire\Forms;

use App\Livewire\Admin\SpareParts;
use App\Models\SparePart;
use App\Models\MaterialRequest;
use App\Models\MeterialRequest;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewMaterialRequestForm extends Component
{
    public $cm; // getting from parts-replacement-card
    public $equipmentSpareParts;

    #[Validate('required')]
    public $sub_cm;


    #[Validate('required')]
    public $date;

     #[Validate('required')]
    public $expected_date;

      #[Validate('required')]
    public $spare_part_id;


      #[Validate('required')]
    public $qty;


    public $remark;



     public function formSave()
    {
        $validated = $this->validate();

        $formData = [
            'cm_number_id' => $this->cm->id,
            'equipment_id' => $this->cm->equipment_id,
            'equipment_tag_id' => $this->cm->equipment_tag_id,
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

    public function mount()
    {

    }

    public function render()
    {
        $this->equipmentSpareParts = SparePart::where('equipment_id', $this->cm->equipment_id)->get();
        return view('livewire.forms.new-material-request-form');
    }
}
