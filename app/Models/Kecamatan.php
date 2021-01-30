<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $fillable =['id_kota','kode_kec','nama_kec'];
    public $timestamps = true;

    public function kota(){
        return $this->belongsTo('App\Models\Kota','id_kota');
    }
    public function kelurahan(){
        return $this->hasMany('App\Models\Kecamatan','id_kec');
    } 
}
