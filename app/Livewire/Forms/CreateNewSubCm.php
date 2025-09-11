<?php

namespace App\Livewire\Forms;

use App\Livewire\MaterialRequestModule\SubCmCard;
use App\Models\CmTaskStatus;
use App\Models\MaterialRequest;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

use Livewire\Component;

class CreateNewSubCm extends Component
{

    public $cm;
    public $editMode = false;
    public $editSubCm;

    public $sub_cm;
    public $date;
    public $expected_date;

    #[On('subCmEditRequestDispatch')]
    public function subCmEditRequestDispatch($item)
    {
        $this->sub_cm = $item['sub_cm'];
        $this->date = $item['date'];
        $this->expected_date = $item['expected_date'];
        $this->editMode = true;
        $this->editSubCm = $item['id'];
    }


     public function formSave()
    {

       $this->resetErrorBag();

        $validated = Validator::make(
            // Data to validate...
            [
                'sub_cm' => $this->sub_cm,
                'date' => $this->date,
                'expected_date' =>  $this->expected_date,
                'cm_number_id' => $this->cm->id,
                'status' => null,
                 'remarks'=> null

            ],

            // Validation rules to apply...
            [
                'sub_cm' => 'required|unique:material_requests,sub_cm,'.$this->editSubCm.'',
                'date' => 'required|date|before:'.$this->expected_date.'',
                'expected_date' => 'required|date|after:'.$this->date.'',
                'cm_number_id' =>'',
                'status' => '',
                'remarks'=> '',
            ],

            // Custom validation messages...
         )->validate();

        MaterialRequest::create($validated);

        // once sub task / material request is done, updte the cmStatus

        CmTaskStatus::where('cm_number_id', $this->cm->id)->update(['task_status_id' => 3] );

        session()->flash('created', 'New SUB CM has been Generated');

           $this->resetExcept('cm');
    }

    public function formUpdate()
    {
        // $validated = $this->validate();
         $this->resetErrorBag();

         $validated = Validator::make(
            // Data to validate...
            [
                'sub_cm' => $this->sub_cm,
                'date' => $this->date,
                'expected_date' =>  $this->expected_date,

            ],

            // Validation rules to apply...
            [
                'sub_cm' => 'required|unique:material_requests,sub_cm,'.$this->editSubCm.'',
                'date' => 'required|date|before:'.$this->expected_date.'',
                'expected_date' => 'required|date|after:'.$this->date.'',
            ],

            // Custom validation messages...
         )->validate();

         MaterialRequest::find($this->editSubCm)->update($validated);

         session()->flash('updated', 'SUB CM has been Updated');




    }

    public function formCloseSubCm()
    {
    $this->resetErrorBag();
    // $this->dispatch('createNewSubCmModal');
    $this->resetExcept('cm');
        redirect()->route('admin_cm_show', ['id' => $this->cm->id]);
    }

    public function render()
    {
        return view('livewire.forms.create-new-sub-cm');
    }
}
