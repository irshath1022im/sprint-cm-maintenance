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

    public function spareParts()
    {
        return $this->hasMany(SparePart::class);
    }

    public function materialRequest()
    {
        return $this->hasManyThrough(
            MaterialRequest::class,
            CorrectiveMaintenance::class,
            'equipment_id',
            'cm_number_id',
            'id'
        );
    }
}
