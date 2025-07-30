<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchOrderItems extends Model
{
    //
protected $fillable = ['batch_order_id','qty','unit_price','total','equipment_tag_id','spare_part_id'];

    public function batchOrder()
    {
        return $this->belongsTo(BatchOrder::class);
    }

    public function equipmentTag()
    {
        return $this->belongsTo(EquipmentTag::class);
    }

    public function sparePart()
    {
        return $this->belongsTo(SparePart::class);
    }
}
