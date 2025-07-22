<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    //

    public function partNumbers()
    {
        return $this->hasMany(EquipmentPartNumber::class);
    }

    public function cmRequests()
    {
        return $this->hasMany(CorrectiveMaintenance::class);
    }
}
