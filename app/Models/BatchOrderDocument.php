<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchOrderDocument extends Model
{
    //

    protected $fillable = ['batch_order_id', 'path','remark'];

    public function batchOrder()
    {
        return $this->belongsTo(BatchOrder::class);
    }
}
