<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    //
    protected $fillable = ['cm_number_id','qty', 'unit_price','total','service_description','service_date'];

    public function cm()
    {
        return $this->belongsTo(CorrectiveMaintenance::class, 'id');
    }
}
