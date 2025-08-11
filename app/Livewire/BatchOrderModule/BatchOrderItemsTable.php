<?php

namespace App\Livewire\BatchOrderModule;

use App\Models\BatchOrderItems;
use Livewire\Attributes\On;
use Livewire\Component;

class BatchOrderItemsTable extends Component
{

public $batch_id; //getting from batch-orders.card with compoment


    public function deletePartsLine($lineId)
    {
        BatchOrderItems::find($lineId)->delete();
        session()->flash('Deleted', 'Receiving Item has been deleted');
        // $this->dispatch('DeletedFromBatchOrderItems');
    }

    #[On('refreshBatchOrderItemsCard')]
    public function refreshBatchOrderItemsCard()
    {

    }

    public function render()
    {
        $result = BatchOrderItems::where('batch_order_id', $this->batch_id)
                                        ->with('batchOrder','equipmentTag','sparePart','materialRequestItemLine')
                                        ->get();
        return view('livewire.batch-order-module.batch-order-items-table',['batchOrderItems' => $result]);
    }
}
