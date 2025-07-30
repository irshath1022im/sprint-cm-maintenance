<?php

namespace App\Livewire\MaterialRequestModule;

use Livewire\Attributes\On;
use Livewire\Component;

class CmMaterialRequest extends Component
{

      public $cm; //getting from cm-show table

    #[On('batchOrderClosingForm')]
    public function materialReceivingFormClose()
    {

    }

    public function render()
    {
        return view('livewire.material-request-module.cm-material-request');
    }
}
