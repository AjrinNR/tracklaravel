<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable =['kode_negara','nama_negara'];
    public $timestamps = true;

    public function kasus(){
        return $this->hasMnay('App\Models\Kasus','id_negara');
    }
}
