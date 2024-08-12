<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    protected $fillable = [
        'nama', 'tgl_lahir','jk','instansi','alamat','negara','kota','kode_pos','email','no_hp'
   ];
}
