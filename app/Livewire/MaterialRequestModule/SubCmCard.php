<?php

namespace App\Livewire\MaterialRequestModule;

use App\Models\CmEquipmentTag;
use App\Models\MaterialRequest;
use App\Models\MaterialRequestItems;
use Livewire\Attributes\On;
use Livewire\Component;

class SubCmCard extends Component
{

    public $cm;
    public $createNewSubCmModal = false;
    public $requestItemsModal = false;
    public $materialReceivingModal = false;
    public $materialId;

    #[On('createNewSubCmModal')]
    public function createNewSubCmModal()
    {
        $this->createNewSubCmModal = false;
    }

    #[On('requestItemsModalClose')]
    public function requestItemsModalClose()
    {
        $this->requestItemsModal = false;
    }

    #[On('materialReceivingFormClose')]
    public function materialReceivingFormClose()
    {
        $this->materialReceivingModal = false;
    }

    public function addPartsToRequest($item)
    {
        $this->dispatch('partRequest',$item);
         $this->requestItemsModal = true;
    }

    public function deletePartsLine($lineId)
    {
        MaterialRequestItems::find($lineId)->Delete();
        // session()->flash('Deleted', 'Spare Parts has been Deleted from Sub Cm');
    }

    public function receivingRequest($item)
    {

        $this->materialId = $item;
        $this->materialReceivingModal = true;
         $this->dispatch('recevingCm',$item);

        // $this->dispatch('materialReceivingModalOpen', $sub_cm);
    }

    public function render()
    {
        $result = MaterialRequest::where('cm_number_id', $this->cm->id)->with('materialRequestItems')->get();
        return view('livewire.material-request-module.sub-cm-card',['materialRequests' => $result]);
    }
}
