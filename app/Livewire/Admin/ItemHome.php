<?php

namespace App\Livewire\Admin;

use App\Models\Item;
use Livewire\Component;

class ItemHome extends Component
{



    public function render()
    {

        $result = Item::get();
        return view('livewire.admin.item-home',['items' => $result])
                        ->extends('components.layouts.app');
    }
}
