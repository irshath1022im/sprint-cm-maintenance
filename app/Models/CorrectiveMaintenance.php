<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorrectiveMaintenance extends Model
{
    //

    protected $fillable = [
        'cm_number',
        'technician_id',
        'request_date',
        'status'
    ];

    


}
