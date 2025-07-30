<?php

namespace App\Livewire\BatchOrderModule;

use App\Models\BatchOrder;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;

class BatchOrdersCard extends Component
{

    public $batch; //getting data from SubCmCard
    public $material_request_id;
    public $material_request_items;
    public $addBatchItemsModal = false;

     #[On('batchOrderClosingForm')]
    public function materialReceivingFormClose()
    {

    }

    #[On('jobOrderItemFormClose')]
    public function jobOrderItemFormClose()
    {
        $this->addBatchItemsModal = false;
    }

    #[On('DeletedFromBatchOrderItems')]
    public function DeletedFromBatchOrderItems() //gettting alert from batch-order-items-table
    {

    }

    public function batchOrderMaterialRequest($batch) //sending batch order details to forms.batch order items
    {
        $this->dispatch('addBatchItems', $batch);
    }



    public function mount(Request $request)
    {
    //    $this->material_request_id = $request->materialRequestId;
    }

    public function render()
    {
        // $result = BatchOrder::where('material_request_id', $this->material_request_id)
        //                         ->with('batchOrderitems','materialRequest')
        //                         ->get();
        return view('livewire.batch-order-module.batch-orders-card');
    }
}
