<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = [
        'nama_jabatan', 'ket'
    ];

    public function editorial()
    {
        return $this->belongsTo(Editorial::class, 'id', 'jabatan');
    }
}
