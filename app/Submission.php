<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submission extends Model
{
    protected $fillable = [
        'user_id','tgl_pengajuan','pengaju','abstrak','judul', 'user_reviewer', 'unsur','ruang_lingkup',
        'kecukupan','kelengkapan','total','nilai','komentar','jurnal','status','jadwal'
    ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_reviewer');
    }
}
