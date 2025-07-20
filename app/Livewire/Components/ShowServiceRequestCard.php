<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ShowServiceRequestCard extends Component
{
    public $activities;


    // public function mount()
    // {
    //     $this
    // }

    public function render()
    {

        return view('livewire.components.show-service-request-card');
    }
}
