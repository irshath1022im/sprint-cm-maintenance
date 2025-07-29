<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialReceiving extends Model
{
    //

    protected $fillable = ['material_request_id','batch_no','receiving_date','supplier_id','qty','unit_price','total','remark'];

    public function materialRequest()
    {
        return $this->belongsTo(MaterialReceiving::class);
    }
}
