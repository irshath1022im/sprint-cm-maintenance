<?php

namespace App\Livewire\Forms;

use App\Models\CorrectiveMaintenance;
use App\Models\Item;
use App\Models\Technician;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CmCreate extends Component
{

    public $technicians;
    public $updated_id;
    public $items;

    #[Validate('required')]
    public $item_id;

    #[Validate('required|unique:corrective_maintenances,cm_number')]
    public $cm_number;

     #[Validate('required')]
    public $technician_id;

     #[Validate('required')]
    public $request_date;

     #[Validate('required')]
    public $status;

    #[Validate('required')]
    public $remarks;




    public function formSubmit()
    {
        $validated = $this->validate();
        $result = CorrectiveMaintenance::create($validated);
        $this->resetExcept('technicians', 'items');
        $this->updated_id = $result->id;
        session()->flash('created', 'CM Created Successfully!');
        // redirect()->to('cm/'.$result->id.'');
    }

    public function mount()
    {


        $this->technicians = Technician::get();
        $this->items = Item::get();
    }


    public function render()
    {
        return view('livewire.forms.cm-create')
            ->extends('components.layouts.app')
        ;
    }
}
