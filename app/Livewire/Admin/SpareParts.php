<?php

namespace App\Livewire\Admin;

use App\Models\SparePart;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SpareParts extends Component
{

    public $formModalStatus = false;
    public $formMode = 'new';
    // this line id is used for update part


    public function openForm()
    {
        $this->formModalStatus = true;
    }


    #[On('newSparePartModalClose')]
    public function newSparePartModalClose()
    {
         $this->formModalStatus = false;
    }



    public function partEdit($line)
    {
        
        $this->formModalStatus = true;
        $this->dispatch('editSparePartRequest', $line);

    }

    public function updatePart()
    {
        $validated = $this->validate();
        SparePart::find($this->lineId)->update($validated);

        $this->resetExcept('formModalStatus');
        session()->flash('updated', 'Parts has been updated...');
    }


    public function render()
    {

        $result = SparePart::with('equipment')->get();

        return view('livewire.admin.spare-parts',['spare_parts' => $result])
                    ->extends('components.layouts.app');
    }



}
