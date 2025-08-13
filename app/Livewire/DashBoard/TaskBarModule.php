<?php

namespace App\Livewire\DashBoard;

use App\Models\CmTaskStatus;
use App\Models\TaskStatus;
use Livewire\Component;

class TaskBarModule extends Component
{
    public function render()
    {

        $result = TaskStatus::withCount('cmTaskStatus')->get();

        return view('livewire.dash-board.task-bar-module',['cmStatus' => $result])
                        ->extends('components.layouts.app');
    }
}
