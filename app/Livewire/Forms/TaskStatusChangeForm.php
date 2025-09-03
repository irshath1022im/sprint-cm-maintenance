<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\TaskStatus;
use App\Models\CmTaskStatus;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class TaskStatusChangeForm extends Component
{
    public $cmId;
    public $cmTaskStatus; //getting from cm-show blade
    public $taskStatus; //mount method
    public $lineIdForCmTaskStatus;

#[Validate('required')]
    public $date;

#[Validate('required')]
    public $task_status_id;


#[On('taskStatusChangeRequest')]
    public function taskStatusChangeRequest()
    {

    }

   public function taskChange()
    {

        $this->validate();
        //check the line id is being updated froum mount or not

        if(isset($this->lineIdForCmTaskStatus))
        {
                CmTaskStatus::find($this->lineIdForCmTaskStatus)->update([
                    'task_status_id' => $this->task_status_id,
                    'date' => $this->date
                    ] );
        }else{

              CmTaskStatus::create(
            [
              'cm_number_id' => $this->cmId,
               'task_status_id' => $this->task_status_id,
               'date' => $this->date
            ]);
        }

    }


     public function mount($cm)
    {
        $this->taskStatus = TaskStatus::get();

         $this->cmId = $cm['id'];

        if(isset($cm->cmStatus)){

            if($cm->cmStatus->count() > 0 ){
                    $this->task_status_id = $cm->cmStatus['task_status_id'];
                    $this->date = $cm->cmStatus['date'];
                     $this->lineIdForCmTaskStatus = $cm->cmStatus['id'];

            } else{
               $this->task_status_id = '';
               $this->date = '';
            }
        }
    }


    public function render()
    {

        return view('livewire.forms.task-status-change-form');
    }
}
