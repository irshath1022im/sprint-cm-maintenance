<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentTag extends Model
{
    //

     public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function cmRequests()
    {
        return $this->hasMany(CorrectiveMaintenance::class);
    }
    
}
