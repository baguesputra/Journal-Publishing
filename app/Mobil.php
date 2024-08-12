<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable=[
        'no_plat','tipe','jenis','foto'
    ];
}
