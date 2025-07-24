<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class MaterialReceivingForm extends Component
{



    public function formClose()
    {
        $this->dispatch('materialReceivingFormClose');
    }

    public function render()
    {
        return view('livewire.forms.material-receiving-form');
    }
}
