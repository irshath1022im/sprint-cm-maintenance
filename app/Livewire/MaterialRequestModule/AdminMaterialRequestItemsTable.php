<?php

namespace App\Livewire\MaterialRequestModule;

use App\Models\MaterialRequest;
use App\Models\MaterialRequestItems;
use Livewire\Attributes\On;
use Livewire\Component;

class AdminMaterialRequestItemsTable extends Component
{
    public $materialRequestId;

    #[On('showRequestItems')]
    public function showRequestItems($requestId)
    {
        $this->materialRequestId = $requestId;
    }

    public function render()
    {
            $result = MaterialRequestItems::where('material_request_id', $this->materialRequestId)->get();
        return view('livewire.material-request-module.admin-material-request-items-table',['materialRequestItems' => $result]);
    }
}
