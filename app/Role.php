<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'nama_role', 'ket'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'level');
    }
}
