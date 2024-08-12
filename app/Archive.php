<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'judul', 'penulis', 'tgl_masuk','hal','tahun','vol','document'
    ];

    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'penulis');
    }
}
