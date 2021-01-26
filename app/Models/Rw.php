<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $fillable =['id_kel','nama'];
    public $timestamps = true;

    public function kelurahan(){
        return $this->belongsTo('App\Models\Kelurahan','id_kel');
    }
    public function kasus2(){
        return $this->hasMany('App\Models\Kasus2','id_rw');
    }
}
