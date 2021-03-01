<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $fillable =['id_kec','nama_kelurahan'];
    public $timestamps = true;

    public function Kecamatan(){
        return $this->belongsTo('App\Models\Kecamatan','id_kec');
    }
    public function Rw(){
        return $this->hasMany('App\Models\Rw','id_kel');
    }
}
