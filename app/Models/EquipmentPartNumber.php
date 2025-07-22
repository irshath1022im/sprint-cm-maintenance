<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentPartNumber extends Model
{
    //

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
