<?php

namespace App\Livewire\MaterialRequestModule;

use Livewire\Component;

class CmMaterialRequest extends Component
{

      public $cm; //getting from cm-show table


    public function render()
    {
        return view('livewire.material-request-module.cm-material-request');
    }
}
