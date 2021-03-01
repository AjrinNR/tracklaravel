<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;

    protected $fillable =['id_kel','nama'];
    public $timestamps = true;

    public function Kelurahan(){
        return $this->belongsTo('App\Models\Kelurahan','id_kel');
    }
    public function Kasus2(){
        return $this->hasMany('App\Models\Kasus2','id_rw');
    }
}
