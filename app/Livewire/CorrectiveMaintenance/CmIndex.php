<?php

namespace App\Livewire\CorrectiveMaintenance;

use App\Models\CorrectiveMaintenance;
use App\Models\TaskStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CmIndex extends Component
{

    public $filterStatus;
    public $cmCreateModal = false;
    public $searchByCmNumber;
    public $date1 = '2025-07-01';
    public $date2;

    use WithPagination;

    #[On('formCloseRequest')]
    public function formCloseRequest()
    {
        $this->cmCreateModal = false;
    }

    public function updatedFilterStatus()
    {
        $this->resetPage();
         $this->reset('searchByCmNumber');
    }

    public function updatedSearchByCmNumber()
    {
         $this->resetPage();
        $this->reset('filterStatus');
    }

    public function cmEditRequest($item)
    {
        $this->cmCreateModal = true;
        $this->dispatch('cmEdit', $item);
    }

    #[Computed()]
    public function cmStatus()
    {
        return TaskStatus::get();

    }

    public function mount(Request $request)
    {
        $this->filterStatus = $request->task_status_id;
        // dd($request->task_status_id);
    }

    public function render()
    {

        $result = CorrectiveMaintenance::query()

                ->when($this->filterStatus, function($q){
                        return $q->withWhereHas('cmStatus', function($query){
                            return $query->where('task_status_id', $this->filterStatus);
                        });
                    })
                ->when($this->searchByCmNumber, function($query){
                    return $query->where('cm_number', 'LIKE', '%'.$this->searchByCmNumber.'%');
                })
                ->when($this->date1, function($query){
                    return $query->where('request_date','>', $this->date1)
                                ->orWhere('request_date','<', $this->date2);
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
