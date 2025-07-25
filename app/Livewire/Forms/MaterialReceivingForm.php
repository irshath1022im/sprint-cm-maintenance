<?php

namespace App\Livewire\Forms;

use App\Models\MaterialReceiving;
use App\Models\Supplier;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MaterialReceivingForm extends Component
{

    public $cm;
    public $suppliers;
    public $remark;
    public $material_request_id;


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




    //find the Meterial Request ID for the cm


    public function formSave()
    {
        $validated =$this->validate();
        $input = [
            'material_request_id' => $this->cm->materialRequest->id,
            'remark' => null,
        ];

        $data=$validated + $input;

        MaterialReceiving::create($data);
        session()->flash('created', 'Material Request is being submited');
    }

    public function formClose()
    {
        $this->dispatch('materialReceivingFormClose');
    }

    public function mount()
    {
        $this->suppliers = Supplier::get();
    }

    public function render()
    {
        return view('livewire.forms.material-receiving-form');
    }
}
