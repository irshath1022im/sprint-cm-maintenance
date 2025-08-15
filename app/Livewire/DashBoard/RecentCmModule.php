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
        $result = CorrectiveMaintenance::latest('id')
                            ->with([
                                    'equipment',
                                    'cmStatus' => function($q){return $q->with('taskStatus');},
                                    'materialRequest'])
                            ->take(5)
                            ->get();
        return view('livewire.dash-board.recent-cm-module',['latestCm' => $result]);
    }
}
