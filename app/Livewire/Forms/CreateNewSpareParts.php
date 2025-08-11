<?php

namespace App\Livewire\Forms;

use App\Models\Equipment;
use App\Models\SparePart;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateNewSpareParts extends Component
{

    public $equipment;
    public $formMode;
    public $lineId;


     #[Validate('required')]
    public $spare_part_name;

     #[Validate('required|unique:spare_parts,spare_part_number',onUpdate: false)]
    public $spare_part_number;

      #[Validate('required')]
    public $equipment_id;


    public function formSave()
    {
        $validated = $this->validate();
        SparePart::create($validated);
        $this->resetExcept('cm', 'equipment');
        session()->flash('created', 'New Spare Part has been addedd!!');

    }

    public function formClose()
    {

        $this->dispatch('newSparePartModalClose');
     $this->resetExcept('cm', 'equipment');
     $this->resetErrorBag();

    }

    #[On('editSparePartRequest')]
    public function editSparePartRequest($line)
    {
        $this->formMode = 'edit';
        $this->lineId = $line['id'];
        $this->spare_part_name = $line['spare_part_name'];
        $this->spare_part_number = $line['spare_part_number'];
        $this->equipment_id = $line['equipment_id'];

    }

    public function formUpdate()
    {
       $validated = $this->validate();
        SparePart::find($this->lineId)->Update($validated);
          session()->flash('updated', 'New Spare Part has been updated!!');
    }

    public function mount()
    {
         $this->equipment = Equipment::orderBy('equipment')->get();
    }

    public function render()
    {
        return view('livewire.forms.create-new-spare-parts');
    }
}
