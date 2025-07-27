<?php

namespace App\Livewire\CorrectiveMaintenance;

use App\Models\CorrectiveMaintenance;
use Livewire\Attributes\On;
use Livewire\Component;

class CmShow extends Component
{

    public $id;
    public $cm_number_id;
    public $cm_number;
    public $technician_id;
    public $requested_date;
    public $status;

    public $serviceRequestModal = false;

    #[On('formCloseRequest')]

    public function formCloseRequest()
    {
        $this->serviceRequestModal = false;
    }




    public function render()
    {

        $result = CorrectiveMaintenance::with(
            ['technician','equipment'])->findOrfail($this->id);
        return view('livewire.corrective-maintenance.cm-show',['cm' => $result])
        ->extends('components.layouts.app')
        ;
    }
}
