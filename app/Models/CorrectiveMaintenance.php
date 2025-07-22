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
        'equipment_id',
        'equipment_part_id',
        'remarks'
    ];

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function equipmentPartNumber()
    {
        return $this->belongsTo(EquipmentPartNumber::class, 'equipment_part_id');
    }




}
