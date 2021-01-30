<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kasus2 extends Model
{
    use HasFactory;
    
    protected $fillable =['id_rw','jumlah_positif','jumlah_sembuh','jumlah_meninggal','tanggal'];
    public $timestamps = true;

    public function getTanggalAttribute(){
        return carbon::parse($this->attributes['tanggal'])
            ->translatedFormat('l, d F Y');
    }

    public function rw(){
        return $this->belongsTo('App\Models\Rw','id_rw');
    }
   
}
