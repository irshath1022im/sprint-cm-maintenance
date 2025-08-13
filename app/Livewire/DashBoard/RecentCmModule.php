<?php

namespace App\Livewire\DashBoard;

use App\Models\CorrectiveMaintenance;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RecentCmModule extends Component
{
    use WithPagination , WithoutUrlPagination ;

    public function render()
    {
        $result = CorrectiveMaintenance::latest('cm_number')
                        ->with([
                            'equipment',
                            'cmStatus' => function($q){return $q->with('taskStatus');},
                            'materialRequest'])
                            ->limit(20)->paginate(5);
        return view('livewire.dash-board.recent-cm-module',['latestCm' => $result]);
    }
}
