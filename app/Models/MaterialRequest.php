<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRequest extends Model
{
    //
    protected $fillable = ['date','cm_number_id','sub_cm', 'equipment_tag_id','spare_part_id','status','expected_date','remarks','qty'];



    public function equipmentTag()
    {
        return $this->belongsTo(EquipmentTag::class);
    }

    public function SparePart()
    {
        return $this->belongsTo(SparePart::class);
    }

    public function cm()
    {
        return $this->belongsTo(CorrectiveMaintenance::class,'cm_number_id');
    }
}
