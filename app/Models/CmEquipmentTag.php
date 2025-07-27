<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmEquipmentTag extends Model
{
    //

    protected $fillable =['cm_number_id','equipment_tag_id'];

    public function cmNumber()
    {
        return $this->belongsTo(CorrectiveMaintenance::class);
    }

    public function equipmentTag()
    {
        return $this->belongsTo(EquipmentTag::class, 'equipment_tag_id');
    }


}
