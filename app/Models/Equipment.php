<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    //

    public function tags()
    {
        return $this->hasMany(EquipmentTag::class);
    }

    public function cmRequests()
    {
        return $this->hasMany(CorrectiveMaintenance::class);
    }
}
