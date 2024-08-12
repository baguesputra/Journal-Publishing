<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    protected $fillable = [
        'nama', 'kode', 'alamat','negara','kota','website','email'
    ];
}
