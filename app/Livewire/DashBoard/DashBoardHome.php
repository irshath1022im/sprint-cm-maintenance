<?php

namespace App\Livewire\DashBoard;

use Livewire\Component;

class DashBoardHome extends Component
{



    public function render()
    {


        return view('livewire.dash-board.dash-board-home')
                ->extends('components.layouts.app');
    }
}
