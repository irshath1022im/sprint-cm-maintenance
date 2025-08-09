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




    public function render()
    {

        $result = CorrectiveMaintenance::with(
            ['technician','equipment','cmStatus'])
            ->findOrfail($this->id);

        return view('livewire.corrective-maintenance.cm-show',['cm' => $result])
        ->extends('components.layouts.app')
        ;
    }
}
