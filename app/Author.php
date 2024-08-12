<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'user_id', 'nama', 'tgl_lahir','nip','jk','instansi','alamat','negara','kota','kode_pos','email','no_hp'
    ];

    public function archive()
    {
        return $this->belongsTo(Author::class, 'id', 'penulis');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
