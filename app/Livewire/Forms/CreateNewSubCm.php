<?php

namespace App\Livewire\Forms;

use App\Models\MaterialRequest;
use Livewire\Attributes\Validate;

use Livewire\Component;

class CreateNewSubCm extends Component
{

    public $cm;

     #[Validate('required|unique:material_requests,sub_cm')]
    public $sub_cm;


    #[Validate('required')]
    public $date;

     #[Validate('required')]
    public $expected_date;


     public function formSave()
    {
        $validated = $this->validate();

        $formData = [
            'cm_number_id' => $this->cm->id,
            // 'equipment_tag_id' => $this->cm->equipment_tag_id,
            'status' => null,
            'remarks'=> null
        ];

        $data = $validated + $formData;

        MaterialRequest::create($data);


        // $result= SparePart::create($validated);
        $this->resetExcept('cm');
        session()->flash('created', 'New SUB CM has been Generated');

        //add the spare parts to spare part table


        //assign this part to cm for next usage

    }

    public function formClose()
    {
    $this->resetErrorBag();
    $this->dispatch('createNewSubCmModal');
    }

    public function render()
    {
        return view('livewire.forms.create-new-sub-cm');
    }
}
