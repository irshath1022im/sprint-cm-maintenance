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
    public $batchOrderModal = false;
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

    #[On('batchOrderClosingForm')]
    public function materialReceivingFormClose()
    {
        $this->batchOrderModal = false;
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

    public function newBatchOrder($item)
    {

        $this->batchOrderModal = true;
        // $this->materialId = $item;
         $this->dispatch('materialRequestDetails',$item);
         $this->dispatch('cm',$this->cm);

        // $this->dispatch('materialReceivingModalOpen', $sub_cm);
    }

    public function render()
    {
        $result = MaterialRequest::where('cm_number_id', $this->cm->id)
                                    ->with('materialRequestItems','batchOrder')
                                    ->get();
        return view('livewire.material-request-module.sub-cm-card',['materialRequests' => $result]);
    }
}
