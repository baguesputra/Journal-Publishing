<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $fillable = [
         'nama', 'tgl_lahir','jk','instansi','alamat','negara','kota','kode_pos','email','no_hp','jabatan'
    ];

    public function jabatan()
    {
        return $this->hasOne(Jabatan::class, 'id', 'jabatan');
    }
}
