<?php

namespace App\Livewire\BatchOrderModule;

use App\Models\BatchOrderItems;
use Livewire\Component;

class BatchOrderItemsTable extends Component
{

    public $batchOrderItems; //getting from batch-orders.card with compoment


    public function deletePartsLine($lineId)
    {
        BatchOrderItems::find($lineId)->delete();
        session()->flash('Deleted', 'Receiving Item has been deleted');
        $this->dispatch('DeletedFromBatchOrderItems');
    }

    public function render()
    {
        return view('livewire.batch-order-module.batch-order-items-table');
    }
}
