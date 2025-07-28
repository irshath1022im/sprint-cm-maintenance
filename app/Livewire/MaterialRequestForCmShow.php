<?php

namespace App\Livewire;

use App\Models\Equipment;
use App\Models\MaterialRequest;
use Livewire\Attributes\On;
use Livewire\Component;

class MaterialRequestForCmShow extends Component
{
    public $cm;
    public $materialRequestModal = false;
    public $materialReceivingModal = false;
    public $equipments;

    #[On('newMaterialRequestFormClose')]
    public function newMaterialRequestFormClose()
    {
        $this->materialRequestModal = false;
    }

    #[On('materialReceivingFormClose')]
     public function materialReceivingFormClose()
    {
        $this->materialReceivingModal = false;
    }

    public function render()
    {
        $result = MaterialRequest::where('cm_number_id', $this->cm->id)->get();
        $equipments = Equipment::get();
        return view('livewire.material-request-for-cm-show',['material_request' => $result]);
    }
}
