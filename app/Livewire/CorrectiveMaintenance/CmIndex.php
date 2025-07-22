<?php

namespace App\Livewire\CorrectiveMaintenance;

use App\Models\CorrectiveMaintenance;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CmIndex extends Component
{

    public $filterStatus;

    use WithPagination, WithoutUrlPagination;

    public function updated($filterStatus)
    {
        $this->resetPage();
    }



    public function render()
    {

        $result = CorrectiveMaintenance::when($this->filterStatus, function($q){
            return $q->where('status', $this->filterStatus);
                    })
                    ->with(['technician', 'equipment','equipmentPartNumber'])
                    ->orderBy('id', 'desc')
                    ->paginate(8);

        return view('livewire.corrective-maintenance.cm-index',['cms' => $result])
                ->extends('components.layouts.app');
    }
}
