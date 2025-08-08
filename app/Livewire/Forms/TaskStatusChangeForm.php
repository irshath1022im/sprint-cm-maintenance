<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\TaskStatus;
use App\Models\CmTaskStatus;



class TaskStatusChangeForm extends Component
{

    public $cm_number_id; //getting from cm-show blade
    public $taskStatus; //mount method
    public $cmStatus; //select method from view
    public $cmStatusLineId;


   public function taskChange()
    {
          CmTaskStatus::find($this->cmStatusLineId)->update(['task_status_id' => $this->cmStatus] );
    }


     public function mount()
    {
        $this->taskStatus = TaskStatus::get();
    }


    //    $query2= CmTaskStatus::where('cm_number_id', $result->id)->get();
    //     $this->lineIdForCmTaskStatus = $query2[0]['id'];
    //     $this->cmStatus = $query2[0]['task_status_id'];

    public function render()
    {
        $query2=CmTaskStatus::where('cm_number_id', $this->cm_number_id)->get();
        //this can be return null value...
        if(empty($query2) || $query2 == null){


        }else{
                $this->cmStatusLineId = $query2[0]['id'];
            }


        return view('livewire.forms.task-status-change-form');
    }
}
