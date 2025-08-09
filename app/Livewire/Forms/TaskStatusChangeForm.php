<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use App\Models\TaskStatus;
use App\Models\CmTaskStatus;



class TaskStatusChangeForm extends Component
{
    public $cmId;
    public $cmTaskStatus; //getting from cm-show blade
    public $taskStatus; //mount method
    public $cmStatus; //select method from view
    public $lineIdForCmTaskStatus;


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


        // if($this->lineIdForCmTaskStatus != null)
        // {
        //      CmTaskStatus::find($this->lineIdForCmTaskStatus)->update(['task_status_id' => $this->cmStatus] );
        // }
        // else{

        // }

        // $this->lineIdForCmTaskStatus;
        //   CmTaskStatus::find($this->cmStatusLineId)->update(['task_status_id' => $this->cmStatus] );
        // CmTaskStatus::updateOrInsert(
        //     ['cm_number_id' => $this->cm_number_id,
        //        'task_status_id' => $this->cmStatus
        //     ]
        // );
    }


     public function mount($cm)
    {
        $this->taskStatus = TaskStatus::get();
        // $query2=CmTaskStatus::where('cm_number_id', $this->cm_number_id)->get();
        // // $this->cmStatus = $query2[0]['task_status_id'];
        // if($query2->count() > 0){
        //     $this->cmStatus = $query2[0]['task_status_id'];
        //     $this->lineIdForCmTaskStatus = $query2[0]['id'];

        // }else{
        //     $this->cmStatus = '';
        // }

         $this->cmId = $cm['id'];

        if(isset($cm->cmStatus)){

            if($cm->cmStatus->count() > 0 ){
                    $this->cmStatus = $cm->cmStatus['task_status_id'];
                     $this->lineIdForCmTaskStatus = $cm->cmStatus['id'];

            } else{
               $this->cmStatus = '';
            }
        }



        // $this->cm

    }


    //    $query2= CmTaskStatus::where('cm_number_id', $result->id)->get();
    //     $this->lineIdForCmTaskStatus = $query2[0]['id'];
    //     $this->cmStatus = $query2[0]['task_status_id'];

    public function render()
    {
        // $query2=CmTaskStatus::where('cm_number_id', $this->cm_number_id)->get();

        //this can be return null value...
        // if(empty($query2) || $query2 == null){


        // }else{
        //         $this->cmStatusLineId = $query2[0]['id'];
        //     }


        return view('livewire.forms.task-status-change-form');
    }
}
