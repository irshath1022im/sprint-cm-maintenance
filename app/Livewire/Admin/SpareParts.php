<?php

namespace App\Livewire\Admin;

use App\Models\SparePart;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SpareParts extends Component
{

    public $formModalStatus = false;
    public $formMode = 'new';
    // this line id is used for update part
    public $lineId;

    #[Validate('required')]
    public $part_name;

    #[Validate('required')]
    public $part_number;


    public function openForm()
    {
        $this->formModalStatus = true;
    }

    public function closeModal()
    {
        $this->resetErrorBag();
         $this->resetExcept('formModalStatus');
        $this->formModalStatus = false;
    }

    public function save()
    {
        $validated = $this->validate();
        SparePart::create($validated);

        $this->resetExcept('formModalStatus');
        session()->flash('created', 'Parts has been added...');
    }

    public function partEdit($line)
    {
        $this->formMode = 'edit';
        $this->part_name = $line['part_name'];
        $this->part_number = $line['part_number'];
        $this->formModalStatus = true;
        $this->lineId = $line['id'];
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

        $result = SparePart::get();

        return view('livewire.admin.spare-parts',['spare_parts' => $result])
                    ->extends('components.layouts.app');
    }



}
