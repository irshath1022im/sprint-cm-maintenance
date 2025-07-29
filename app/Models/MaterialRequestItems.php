<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialRequestItems extends Model
{
    //
    protected $fillable = ['material_request_id','equipment_tag_id','spare_part_id','qty'];

    public function equipmentTag()
    {
        return $this->belongsTo(EquipmentTag::class);
    }

    public function materialRequest()
    {
        return $this->belongsTo(MaterialRequest::class);
    }
    public function sparePart()
    {
        return $this->belongsTo(SparePart::class);
    }

}
