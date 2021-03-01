<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $fillable =['id_prov','kode_kota','nama_kota'];
    public $timestamps = true;

    public function Provinsi(){
        return $this->belongsTo('App\Models\Provinsi','id_prov');
    }
    public function Kecamatan(){
        return $this->hasMany('App\Models\Kecamatan','id_kota');
    }
}
