<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WmtTransactionDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id',];
    protected $with = ['detailProduct'];
    public function detailProduct(){
        return $this->belongsTo(WmtProduct::class, 'product_code', 'id');
    }
}
