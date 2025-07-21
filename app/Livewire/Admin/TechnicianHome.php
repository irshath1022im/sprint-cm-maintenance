<?php

namespace App\Livewire\Admin;

use App\Models\Technician;
use Livewire\Component;

class TechnicianHome extends Component
{



    public function render()
    {

        $result = Technician::get();
        return view('livewire.admin.technician-home',['technicians' => $result])
                ->extends('components.layouts.app');
    }


}
