<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $fillable =['id_kec','nama_kelurahan'];
    public $timestamps = true;

    public function kecamatan(){
        return $this->belongsTo('App\Models\Kecamatan','id_kec');
    }
    public function rw(){
        return $this->hasMany('App\Models\Rw','id_kel');
    }
}
