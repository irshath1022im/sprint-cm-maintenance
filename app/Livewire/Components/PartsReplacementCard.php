<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class PartsReplacementCard extends Component
{
    public $cm; //getting from cm-show table

    public $materialRequestModal = true;
    public $sparePartsModal = false;


    #[On('newSparePartModalClose')]
    public function newSparePartModalClose()
    {
        $this->sparePartsModal = false;
    }



    public function render()
    {
        return view('livewire.components.parts-replacement-card');
    }
}
