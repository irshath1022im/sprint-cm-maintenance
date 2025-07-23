<?php

namespace App\Livewire\Forms;

use App\Models\ServiceRequest;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewServiceRequest extends Component
{

    public $cm;

    public $cm_number_id;
    public $qty;
    public $unit_price;
    public $total;
    #[Validate('required')]
    public $service_description;

    #[Validate('required')]
    public $service_date;

    public function formSubmit()
    {

        $this->validate();
        $data = [
            'cm_number_id' => $this->cm->id,
            'qty' => $this->qty,
            'unit_price' => $this->unit_price,
            'total' => $this->total,
            'service_description' => $this->service_description,
            'service_date' => $this->service_date,
        ];

        ServiceRequest::create($data);
        $this->resetErrorBag();
        $this->resetExcept('$cm');
        session()->flash('created','New Service Request is created');

        }

    public function formClose()
    {
            $this->resetErrorBag();
            $this->resetExcept('$cm');
            $this->dispatch('formCloseRequest');

    }


    public function render()
    {
        return view('livewire.forms.new-service-request');
    }
}
