<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceActivity extends Model
{
    //
    protected $fillable =['cm_number_id','technician_id','service_type','item_id','spare_part_id','spare_part_number','qty','unit_price','total','service_description','remark'];

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function sparePart()
    {
        return $this->belongsTo(SparePart::class);
    }

}
