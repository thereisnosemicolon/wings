<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WmtTransactionHeader extends Model
{
    use HasFactory;
    protected $guarded = ['id',];
    public function getDetail(){
        return $this->hasMany(WmtTransactionDetail::class, 'header','id');
    }
    public function datauser(){
        return $this->hasOne(User::class,'id','user');
    }

}
