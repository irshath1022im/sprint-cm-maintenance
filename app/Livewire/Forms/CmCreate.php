<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class CmCreate extends Component
{

    public $cm_number = 120;

    public function render()
    {
        return view('livewire.forms.cm-create')
            ->extends('components.layouts.app')
        ;
    }
}
