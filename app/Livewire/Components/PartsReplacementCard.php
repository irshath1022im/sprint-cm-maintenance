<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class PartsReplacementCard extends Component
{
    public $cm; //getting from cm-show table


    public function render()
    {

        return view('livewire.components.parts-replacement-card',);
    }
}
