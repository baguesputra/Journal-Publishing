<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'judul', 'penulis', 'tgl_masuk','hal','tahun','vol','document'
    ];
}
