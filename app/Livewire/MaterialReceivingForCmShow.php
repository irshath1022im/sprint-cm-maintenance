<?php

namespace App\Livewire;

use App\Models\MaterialReceiving;
use Livewire\Attributes\On;
use Livewire\Component;

class MaterialReceivingForCmShow extends Component
{


#[On('refreshCmShow')]
public function refreshCmShow()
{

}



    public function render()
    {

        $result = MaterialReceiving::get();
        return view('livewire.material-receiving-for-cm-show');
    }
}
