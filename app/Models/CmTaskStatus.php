<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmTaskStatus extends Model
{
    //
    protected $fillable = ['cm_number_id','task_status_id'];

    public function cmNumber()
    {
        return $this->belongsTo(CorrectiveMaintenance::class, 'id');
    }

    public function taskStatus()
    {
        return $this->belongsTo(TaskStatus::class);
    }


}
