<?php

namespace App\Livewire\Forms;

use App\Models\BatchOrderItems;
use App\Models\CmTaskStatus;
use App\Models\MaterialRequestItems;
use Illuminate\Http\Client\Request as ClientRequest;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BatchOrderItemForm extends Component
{
    // public $material_request_items=[
    //     ['batch_order_id' => 1, 'equipment_tag_id' => 1639, 'qty' => 2 ],
    //     ['batch_order_id' => 1, 'equipment_tag_id' => 1640, 'qty' => 3 ]
    // ];

    public $cm;
    public $batch;
    // public $material_request_items=[];
    public $batch_order_id;
    public $material_request_item_id;
    public $barthOrderItems=[];
    public $cmId; //getting from request url
    public $spare_part_name;
    public $materialRequestLineId;
    public $spare_part_number;

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
        $this->batch = $batch;
        $this->batch_order_id = $batch['id']; //getting batch infor from Batch Order Card using dispatch method

        // $this->material_request_items = MaterialRequestItems::where('material_request_id', $batch['material_request_id'])
        //                                      ->with('equipmentTag')
        //                                     ->get();

    }

    public function updatedUnitPrice()
    {
        $this->total = $this->unit_price*$this->qty;
    }



    public function updatedMaterialRequestLineId()
    {

        //get the line id from form input

        $this->reset('spare_part_id','spare_part_name','unit_price','total','qty');

        if($this->materialRequestLineId != '')
            {

                    $query = MaterialRequestItems::find($this->materialRequestLineId);
                    $this->equipment_tag_id = $query->equipment_tag_id;
                    $this->spare_part_id = $query->spare_part_id;
                    $this->spare_part_name = $query->sparePart->spare_part_name;
                    $this->qty = $query->qty;
                    $this->spare_part_number = $query->sparePart->spare_part_number;

            }


        // for ($i=0; $i < count($this->material_request_items) ; $i++) {
        //     if($this->material_request_items->id['equipment_tag_id'] == $this->equipment_tag_id){
        //         $this->qty = $this->material_request_items[$i]['qty'];
        //         $this->material_request_item_id = $this->material_request_items[$i]['id'];
        //         $this->spare_part_id = $this->material_request_items[$i]['spare_part_id'];
        //     }
        // }
    }



    public function addItems()
    {

       $validated = $this->validate();

        $data = $validated + [
            'batch_order_id' => $this->batch_order_id,
            'material_request_item_id' => $this->materialRequestLineId
         ];
        BatchOrderItems::updateOrCreate(
           ['material_request_item_id' => $this->materialRequestLineId], //atributes to check the line id is exist or not
           $data  //values to update or insert

        );

        CmTaskStatus::where('cm_number_id', $this->cm['id'])->update(['task_status_id' => 4] );


        session()->flash('created', 'Spare Parts Has been received');
         $this->reset('spare_part_id','spare_part_name','spare_part_number','unit_price','total','qty');
        $this->dispatch('refreshBatchOrderItemsCard');
    }

    public function formClose()
    {
        $this->dispatch('jobOrderItemFormClose');
        // $this->dispatch('refreshCmShow');
        $this->reset('unit_price','total','qty');
    }

    public function mount($batch)
    {
        $this->batch = $batch;
    }

    #[Computed()]
    public function materialRequestItems()
    {
        return MaterialRequestItems::where('material_request_id', $this->batch['material_request_id'])
                                             ->with('equipmentTag')
                                            ->get();
    }



}
