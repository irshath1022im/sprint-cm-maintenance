<?php

namespace App\Livewire\Forms;

use App\Models\BatchOrder;
use App\Models\MaterialRequest;
use App\Models\MaterialRequestItems;
use App\Models\Supplier;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewBatchOrder extends Component
{

    public $materialRequestId;
    public $materialRequestRetails;
    public $sub_cm;
    public $suppliers;

    #[Validate('required|unique:batch_orders,batch_no')]
    public $batch_no;

    #[Validate('required')]
    public $receiving_date;

    #[Validate('required')]
    public $supplier_id;



    #[On('materialRequestDetails')] //receiving materialRequestDetaisl from dispatch method from SubCmCard
    public function materialRequestDetails($materialRequestDetails)
    {
        $this->materialRequestRetails = $materialRequestDetails;;
        // $this->sub_cm = $materialRequestDetails['sub_cm'];
        $this->materialRequestId = $materialRequestDetails['id'];
    }

      public function formClose()
    {
        $this->dispatch('batchOrderClosingForm');
        $this->resetErrorBag();

    }

      public function formSave()
    {
        $validated =$this->validate();
        $input = [
            'material_request_id' => $this->materialRequestId,
            'remarks' => null,
        ];

        $data = $validated +$input;

        BatchOrder::create($data);

        session()->flash('created', 'Material Request is being submited');
        $this->reset('batch_no','receiving_date','supplier_id');

    }

    public function mount()
    {
        $this->suppliers = Supplier::get();

    }


    public function render()
    {
        return view('livewire.forms.new-batch-order');
    }
}
