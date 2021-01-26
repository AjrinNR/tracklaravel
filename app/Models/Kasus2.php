<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus2 extends Model
{
    protected $fillable =['id_rw','jumlah_positif','jumlah_sembuh','jumlah_meninggal','tanggal'];
    public $timestamps = true;

    public function rw(){
        return $this->belongsTo('App\Models\Rw','id_rw');
    }
   
}
