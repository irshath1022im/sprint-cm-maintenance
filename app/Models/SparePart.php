<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    //
    protected $fillable = ['spare_part_name','spare_part_number','equipment_id','part_description','image_path'];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function materialRequestItems()
    {
        return $this->hasMany(MaterialRequest::class);
    }

      public function batchOrderItems()
    {
        return $this->hasMany(BatchOrderItems::class);
    }
}
