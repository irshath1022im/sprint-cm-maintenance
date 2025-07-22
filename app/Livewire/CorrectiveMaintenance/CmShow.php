<?php

namespace App\Livewire\CorrectiveMaintenance;

use App\Models\CorrectiveMaintenance;
use App\Models\ServiceActivity;
use Livewire\Component;

class CmShow extends Component
{

    public $id;
    public $cm_number_id;
    public $cm_number;
    public $technician_id;
    public $requested_date;
    public $status;

    public $service_type;
    // public $

    public function mount($id)
    {
        $cm = CorrectiveMaintenance::find($id);
        $this->cm_number_id = $cm->id;
        $this->cm_number = $cm->cm_number;
        $this->technician_id = $cm->technician_id;
        $this->requested_date = $cm->request_date;
        $this->status = $cm->status;
    }

    public function render()
    {

        $ser_result = CorrectiveMaintenance::findOrfail($this->id)
                                        ->with('technician','equipment')
                                        ->get();

        return view('livewire.corrective-maintenance.cm-show',['activities' => $ser_result])
        ->extends('components.layouts.app')
        ;
    }
}
