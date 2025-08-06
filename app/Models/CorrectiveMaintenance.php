<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class CorrectiveMaintenance extends Model
{


    protected $fillable = [
        'cm_number',
        'technician_id',
        'request_date',
        'status',
        'equipment_id',
        'remarks'
    ];

  protected function casts(): array
    {
        return [
            'cm_number' => 'integer',
        ];
    }
    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }



    public function serviceRequest()
    {
        return $this->hasMany(ServiceRequest::class,'cm_number_id');
    }

    public function materialRequest()
    {
        return $this->hasOne(MaterialRequest::class, 'cm_number_id');
    }

    public function spareParts()
    {
        return $this->hasOneThrough(
           SparePart::class,
           Equipment::class,
           'id',
           'equipment_id',
           'equipment_id'

        );
    }

    public function materialReceiving()
    {
        return $this->hasOneThrough(
            MaterialReceiving::class,
            MaterialRequest::class,
            'cm_number_id', // cm table and material request table ..have relationship...so in materialRequest cm_number_id is the foregin key
            'material_request_id', //material receiving table and material request table...have relation ship using material_request_id
            'id' // we need to find using this id from cm table filter the data from material request table and material reques table
        );
    }

}
