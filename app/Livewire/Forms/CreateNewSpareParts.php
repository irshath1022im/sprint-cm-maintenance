<?php

namespace App\Livewire\Forms;

use App\Models\Equipment;
use App\Models\SparePart;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateNewSpareParts extends Component
{

    public $cm; //getting from cm-show from to card component then this components



     #[Validate('required')]
    public $spare_part_name;

     #[Validate('required')]
    public $spare_part_number;

    public function formSave()
    {
        $validated = $this->validate();
        $coll1 = ['equipment_id' => $this->cm->equipment_id];
        $data = $validated + $coll1;
        $result= SparePart::create($data);
        $this->resetExcept('cm');
        session()->flash('created', 'New Spare Part has been addedd!!');

        //add the spare parts to spare part table


        //assign this part to cm for next usage

    }

    public function formClose()
    {

    $this->dispatch('newSparePartModalClose');
     $this->resetExcept('cm');
     $this->resetErrorBag();

    }

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.forms.create-new-spare-parts');
    }
}
