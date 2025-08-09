<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\TaskStatus;
use App\Models\CmTaskStatus;
use Livewire\Attributes\On;

class TaskStatusChangeForm extends Component
{
    public $cmId;
    public $cmTaskStatus; //getting from cm-show blade
    public $taskStatus; //mount method
    public $cmStatus; //select method from view
    public $lineIdForCmTaskStatus;


#[On('taskStatusChangeRequest')]
public function taskStatusChangeRequest()
{

}

   public function taskChange()
    {

        //check the line id is being updated froum mount or not

        if(isset($this->lineIdForCmTaskStatus))
        {
                CmTaskStatus::find($this->lineIdForCmTaskStatus)->update(['task_status_id' => $this->cmStatus] );
        }else{

              CmTaskStatus::create(
            [
              'cm_number_id' => $this->cmId,
               'task_status_id' => $this->cmStatus
            ]);
        }

    }


     public function mount($cm)
    {
        $this->taskStatus = TaskStatus::get();

         $this->cmId = $cm['id'];

        if(isset($cm->cmStatus)){

            if($cm->cmStatus->count() > 0 ){
                    $this->cmStatus = $cm->cmStatus['task_status_id'];
                     $this->lineIdForCmTaskStatus = $cm->cmStatus['id'];

            } else{
               $this->cmStatus = '';
            }
        }
    }


    public function render()
    {

        return view('livewire.forms.task-status-change-form');
    }
}
