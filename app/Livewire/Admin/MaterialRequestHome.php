<?php

namespace App\Livewire\Admin;

use App\Models\MaterialRequest;
use Livewire\Component;

class MaterialRequestHome extends Component
{
    public function render()
    {

        $result = MaterialRequest::with(['cm','equipment','equipmentTag','sparePart'])->get();
        return view('livewire.admin.material-request-home',['material_requests' => $result])
            ->extends('components.layouts.app');
    }
}
