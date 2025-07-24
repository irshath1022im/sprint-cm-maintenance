<?php

namespace App\Livewire\Components;

use App\Models\MaterialRequest;
use Livewire\Attributes\On;
use Livewire\Component;

class PartsReplacementCard extends Component
{
    public $cm; //getting from cm-show table

    public $materialRequestModal = false;
    public $sparePartsModal = false;
    public $materialReceivingModal = true;


    #[On('newSparePartModalClose')]
    public function newSparePartModalClose()
    {
        $this->sparePartsModal = false;
    }

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
        return view('livewire.components.parts-replacement-card',['material_request' => $result]);
    }
}
