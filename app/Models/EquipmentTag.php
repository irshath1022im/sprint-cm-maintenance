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


    public function serviceRequests()
    {
        return $this->hasManyThrough(
            ServiceRequest::class,  //we will get the all the records from this table , this will be the output
            CorrectiveMaintenance::class, // get the information thru this table..becase equipmentTag is not have any direct relatiopship
            'equipment_tag_id', //we need the information related the equipment_tag_id which has in CorrectiveMaintenance Table
            'cm_number_id', // this colum should match / have in both table ( serviceRequest and CorrectiveMaintenance table)
            'id',
        );
    }


    public function materialRequestItems()
    {
        return $this->hasMany(MaterialRequestItems::class);
    }

    public function batchOrderItems()
    {
        return $this->hasMany(BatchOrderItems::class,'equipment_tag_id');
    }

}
