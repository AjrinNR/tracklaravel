<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    protected $fillable =['id_negara','jumlah_positif','jumlah_sembuh','jumlah_meninggal','tanggal'];
    public $timestamps = true;

    public function country(){
        return $this->belongsTo('App\Models\Country','id_negara');
    }
}
