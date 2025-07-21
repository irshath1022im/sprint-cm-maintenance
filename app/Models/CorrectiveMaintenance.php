<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorrectiveMaintenance extends Model
{


    protected $fillable = [
        'cm_number',
        'technician_id',
        'request_date',
        'status',
        'item_id',
        'remarks'
    ];

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }



}
