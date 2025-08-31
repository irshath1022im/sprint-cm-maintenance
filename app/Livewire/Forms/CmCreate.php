<?php

namespace App\Livewire\Forms;

use App\Models\CmTaskStatus;
use App\Models\CorrectiveMaintenance;
use App\Models\Equipment;
use App\Models\EquipmentTag;
use App\Models\TaskStatus;
use App\Models\Technician;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CmCreate extends Component
{

    public $technicians;
    public $updated_id;
    public $equipment;
    public $tags = [];
    public $formMode;
    public $editLineId;

    #[Validate('required')]
    public $equipment_id;


    #[Validate('required|unique:corrective_maintenances,cm_number', onUpdate: false)]
    public $cm_number;

     #[Validate('required')]
    public $technician_id;

     #[Validate('required')]
    public $request_date;


    #[Validate('required')]
    public $remarks;



    // public function updated($equipment_tag_id)
    // {
    //     // $this->equipment_part_id = 2;

    //     $this->tags =EquipmentTag::where('equipment_id', $this->equipment_id )->get();


    // }

    #[On('cmEdit')]
    public function cmEdit($item)
    {
        $this->editLineId = $item['id'];
        $this->equipment_id = $item['equipment_id'];
        $this->cm_number = $item['cm_number'];
        $this->technician_id = $item['technician_id'];
        $this->request_date = $item['request_date'];
        $this->remarks = $item['remarks'];
        $this->formMode = 'edit';
    }


    public function formSubmit()
    {
        $validated = $this->validate();
        $result = CorrectiveMaintenance::create($validated);
        // once cm created update the status
        CmTaskStatus::create(['cm_number_id' =>$result->id, 'task_status_id' => 1 ]);
        $this->resetExcept('technicians', 'equipment');
        $this->updated_id = $result->id ;
        session()->flash('created', 'CM Created Successfully!');
        redirect()->to('admin/cm/'.$result->id.'');
    }

    public function formEdit()
    {
         $validated = Validator::make(
            // Data to validate...
            [
                'equipment_id' => $this->equipment_id,
                'cm_number' => $this->cm_number,
                'technician_id' =>  $this->technician_id,
                'request_date' => $this->request_date,
                'remarks' => $this->remarks

            ],

            // Validation rules to apply...
            [
                'equipment_id' => 'required',
                'cm_number' => 'required|unique:corrective_maintenances,cm_number,'.$this->editLineId.'',
                'technician_id' => 'required',
                'request_date' => 'required',
                'remarks' => 'required'
            ],

            // Custom validation messages...
         )->validate();

        $result = CorrectiveMaintenance::find($this->editLineId)->update($validated);
        // once cm created update the status
        session()->flash('updated', 'CM Updated Successfully!');
        redirect()->to('admin/cm/'.$this->editLineId.'');



          $this->resetErrorBag();


    }


    public function formClose()
    {
        $this->resetExcept('technicians','equipment');
        $this->resetErrorBag();
        $this->dispatch('formCloseRequest');
    }

    public function mount()
    {
        $this->technicians = Technician::get();
        $this->equipment = Equipment::orderBy('equipment')->get();
    }


    public function render()
    {
        return view('livewire.forms.cm-create')
            ->extends('components.layouts.app')
        ;
    }
}
