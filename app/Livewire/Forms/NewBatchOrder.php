<?php

namespace App\Livewire\Forms;

use App\Models\MaterialRequest;
use App\Models\MaterialRequestItems;
use App\Models\Supplier;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewBatchOrder extends Component
{

    public $sub_cm;
    public $materialRequestitems;
    public $suppliers;

    #[Validate('required')]
    public $batch_no;

    #[Validate('required')]
    public $receiving_date;

    #[Validate('required')]
    public $supplier_id;

    #[Validate('required')]
    public $qty;

    #[Validate('required')]
    public $unit_price;

    #[Validate('required')]
    public $total;


    #[On('recevingCm')]
    public function recevingCm($item)
    {
        $this->materialRequestitems = MaterialRequestItems::where('material_request_id', $item)->get();
        $this->sub_cm = $item['sub_cm'];
    }

      public function formClose()
    {
        $this->dispatch('materialReceivingFormClose');

    }

      public function formSave()
    {
        $validated =$this->validate();
        $input = [
            'material_request_id' => $this->cm->materialRequest->id,
            'remark' => null,
        ];

        // $data=$validated + $input;

        // MaterialReceiving::create($data);
        // session()->flash('created', 'Material Request is being submited');
    }


    public function render()
    {
        $this->suppliers = Supplier::get();
        return view('livewire.forms.new-batch-order');
    }
}
