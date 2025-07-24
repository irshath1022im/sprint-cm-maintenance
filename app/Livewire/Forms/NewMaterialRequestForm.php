<?php

namespace App\Livewire\Forms;

use App\Livewire\Admin\SpareParts;
use App\Models\SparePart;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewMaterialRequestForm extends Component
{
    public $cm; // getting from parts-replacement-card
    public $equipmentSpareParts;

    #[Validate('required')]
    public $sub_cm;

      #[Validate('required')]
    public $spare_part_id;




     public function formSave()
    {
        $validated = $this->validate();
        // $result= SparePart::create($validated);
        // $this->resetExcept('cm','equipments');
        // session()->flash('created', 'New Spare Part has been addedd!!');

        //add the spare parts to spare part table


        //assign this part to cm for next usage

    }

    public function formClose()
    {

    // $this->dispatch('newSparePartModalClose');
    // $this->resetExcept('cm','equipments');
    // $this->resetErrorBag();

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
