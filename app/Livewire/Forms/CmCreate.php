<?php

namespace App\Livewire\Forms;

use App\Models\CorrectiveMaintenance;
use App\Models\Equipment;
use App\Models\EquipmentPartNumber;
use App\Models\Technician;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CmCreate extends Component
{

    public $technicians;
    public $updated_id;
    public $equipment;
    public $equipmentParts = [];

    #[Validate('required')]
    public $equipment_id;

    #[Validate('required')]
    public $equipment_part_id;

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



    public function updatedEquipmentId()
    {
        // $this->equipment_part_id = 2;

        $this->equipmentParts =EquipmentPartNumber::where('equipment_id', $this->equipment_id )->get();


    }


    public function formSubmit()
    {
        $validated = $this->validate();
        $result = CorrectiveMaintenance::create($validated);
        $this->resetExcept('technicians', 'equipment');
        $this->updated_id = $result->id;
        session()->flash('created', 'CM Created Successfully!');
        // redirect()->to('cm/'.$result->id.'');
    }

    public function mount()
    {


        $this->technicians = Technician::get();
        $this->equipment = Equipment::get();
    }


    public function render()
    {
        return view('livewire.forms.cm-create')
            ->extends('components.layouts.app')
        ;
    }
}
