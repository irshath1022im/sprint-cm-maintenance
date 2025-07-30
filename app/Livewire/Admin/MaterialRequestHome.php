<?php

namespace App\Livewire\Admin;

use App\Models\MaterialRequest;
use Livewire\Attributes\On;
use Livewire\Component;

class MaterialRequestHome extends Component
{

    public $materialRequestPopup = false;


    public function openRequestItems($requestId)
    {
        $this->dispatch('showRequestItems',$requestId);
        $this->materialRequestPopup = true;
    }

    #[On('formClose')]
    public function formClose()
    {
        $this->materialRequestPopup = false;
    }

    public function render()
    {

        $result = MaterialRequest::with(['cm','equipmentTag','sparePart'])->paginate(10);
        return view('livewire.admin.material-request-home',['material_requests' => $result])
            ->extends('components.layouts.app');
    }
}
