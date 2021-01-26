<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $fillable =['id_prov','kode_kota','nama_kota'];
    public $timestamps = true;

    public function provinsi(){
        return $this->belongsTo('App\Models\Provinsi','id_prov');
    }
    public function kecamatan(){
        return $this->hasMany('App\Models\Kecamatan','id_kota');
    }
}
