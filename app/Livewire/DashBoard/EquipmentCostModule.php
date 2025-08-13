<?php

namespace App\Livewire\DashBoard;

use App\Models\Equipment;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class EquipmentCostModule extends Component
{

    use WithPagination;
    use WithoutUrlPagination;
    public function render()
    {
        $result = Equipment::has('batchOrderItems')
                    ->withSum('batchOrderItems', 'total')
                    ->orderByDesc('batch_order_items_sum_total')
                    ->paginate(3);
        // $result2 = $result->sortByDesc('batch_order_items_sum_total');
        return view('livewire.dash-board.equipment-cost-module',['equipment' => $result]);
    }
}
