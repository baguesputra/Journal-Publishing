<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $fillable =[ //fungsi protected fillable yaitu untuk memanggil field yang dapat diisi oleh kita
        'nama','jurusan','alamat','no'
    ];
}
