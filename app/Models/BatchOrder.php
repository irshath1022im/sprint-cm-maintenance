<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchOrder extends Model
{
    //
    protected $fillable = ['batch_no','material_request_id','supplier_id','receiving_date'];

    public function materialRequest()
    {
        return $this->belongsTo(MaterialRequest::class);
    }

    public function batchOrderitems()
    {
        return $this->hasMany(BatchOrderItems::class);
    }

    public function batchOrderDocument()
    {
        return $this->hasOne(BatchOrderDocument::class);
    }

}
