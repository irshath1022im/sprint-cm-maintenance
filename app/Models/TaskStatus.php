<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    //

    public function cmTaskStatus()
    {
        return $this->hasMany(CmTaskStatus::class,'task_status_id');
    }

}
