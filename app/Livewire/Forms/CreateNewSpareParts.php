<?php

namespace App\Livewire\Forms;

use App\Models\Equipment;
use App\Models\SparePart;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateNewSpareParts extends Component
{

    public $cm; //getting from cm-show from to card component then this components

    public $equipments;
    #[Validate('required')]
    public $equipment_id;

     #[Validate('required')]
    public $spare_part_name;

     #[Validate('required')]
    public $spare_part_number;

    public function formSave()
    {
        $validated = $this->validate();
        $result= SparePart::create($validated);
        $this->resetExcept('cm','equipments');
        session()->flash('created', 'New Spare Part has been addedd!!');

        //add the spare parts to spare part table


        //assign this part to cm for next usage

    }

    public function formClose()
    {

    $this->dispatch('newSparePartModalClose');
     $this->resetExcept('cm','equipments');
     $this->resetErrorBag();

    }

    public function mount()
    {
        $this->equipments = Equipment::get();
    }

    public function render()
    {
        return view('livewire.forms.create-new-spare-parts');
    }
}
