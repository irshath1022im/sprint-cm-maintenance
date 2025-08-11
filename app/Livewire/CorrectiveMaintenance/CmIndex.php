<?php

namespace App\Livewire\CorrectiveMaintenance;

use App\Models\CorrectiveMaintenance;
use App\Models\TaskStatus;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CmIndex extends Component
{

    public $filterStatus;
    public $cmCreateModal = false;

    use WithPagination;

    #[On('formCloseRequest')]
    public function formCloseRequest()
    {
        $this->cmCreateModal = false;
    }

    public function updated($filterStatus)
    {
        $this->resetPage();
    }

    #[Computed()]
    public function cmStatus()
    {
        return TaskStatus::get();
    }


    public function render()
    {

        $result = CorrectiveMaintenance::query()

                ->when($this->filterStatus, function($q){
                        return $q->withWhereHas('cmStatus', function($query){
                            return $query->where('task_status_id', $this->filterStatus);
                        });
                    })
                    ->with([
                        'technician',
                        'equipment',
                        'cmStatus' => function($q){return $q->with('taskStatus');}
                        ])
                    ->orderBy('cm_number', 'desc')
                    ->paginate(8);

        return view('livewire.corrective-maintenance.cm-index',['cms' => $result])
                ->extends('components.layouts.app');
    }
}
