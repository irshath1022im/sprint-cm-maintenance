<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class MaterialRequest extends Component
{
    public function render()
    {
        return view('livewire.admin.material-request')
            ->extends('components.layouts.app');
    }
}
