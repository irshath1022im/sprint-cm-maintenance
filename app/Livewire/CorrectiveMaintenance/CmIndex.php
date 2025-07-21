<?php

namespace App\Livewire\CorrectiveMaintenance;

use App\Models\CorrectiveMaintenance;
use Livewire\Component;

class CmIndex extends Component
{

    public $filterStatus;

    public function udpatedFilterStatus()
    {

    }



    public function render()
    {

        $result = CorrectiveMaintenance::when($this->filterStatus, function($q){
            return $q->where('status', $this->filterStatus);
                    })
                    ->with(['technician', 'item'])
                    ->orderBy('id', 'desc')
                    ->paginate(8);

        return view('livewire.corrective-maintenance.cm-index',['cms' => $result])
                ->extends('components.layouts.app');
    }
}
