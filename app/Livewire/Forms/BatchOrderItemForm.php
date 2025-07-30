<?php

namespace App\Livewire\Forms;

use App\Models\BatchOrderItems;
use App\Models\MaterialRequestItems;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BatchOrderItemForm extends Component
{
    // public $material_request_items=[
    //     ['batch_order_id' => 1, 'equipment_tag_id' => 1639, 'qty' => 2 ],
    //     ['batch_order_id' => 1, 'equipment_tag_id' => 1640, 'qty' => 3 ]
    // ];

    public $material_request_items=[];
    public $batch_order_id;

    #[Validate('required')]
    public $equipment_tag_id;


    #[Validate('required')]
    public $spare_part_id;

     #[Validate('required')]
    public $unit_price;

    #[Validate('required')]
    public $total;

      #[Validate('required')]
    public $qty;


    #[On('addBatchItems')]
    public function addBatchItems($batch)
    {
        $this->material_request_items = MaterialRequestItems::where('material_request_id', $batch['material_request_id'])
                                             ->with('equipmentTag')
                                            ->get();

        $this->batch_order_id = $batch['id']; //getting batch infor from Batch Order Card using dispatch method
    }

    public function updatedUnitPrice()
    {
        $this->total = $this->unit_price*$this->qty;
    }

    public function updatedEquipmentTagId()
    {

        $this->reset('unit_price','total','qty');

        for ($i=0; $i < count($this->material_request_items) ; $i++) {
            if($this->material_request_items[$i]['equipment_tag_id'] == $this->equipment_tag_id){
                $this->qty = $this->material_request_items[$i]['qty'];
                $this->spare_part_id = $this->material_request_items[$i]['spare_part_id'];
            }
        }
    }



    public function addItems()
    {
       $validated = $this->validate();

        $data = $validated + ['batch_order_id' => $this->batch_order_id];
        BatchOrderItems::create($data);
        session()->flash('created', 'Spare Parts Has been received');
        $this->reset('unit_price','total','qty','spare_part_id');
    }

    public function formClose()
    {
        $this->dispatch('jobOrderItemFormClose');
        $this->reset('unit_price','total','qty');
    }

    public function render()
    {
        // $this->material_request_items = MaterialRequestItems::where('material_request_id', 3)->with('equipmentTag')->get();
        return view('livewire.forms.batch-order-item-form');
    }

}
