<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->date('tgl_pengajuan');
            $table->string('pengaju');
            $table->string('judul');
            $table->string('abstrak');
            $table->biginteger('user_reviewer')->unsigned();
            $table->foreign('user_reviewer')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->string('unsur');
            $table->string('ruang_lingkup');
            $table->string('kecukupan');
            $table->string('kelengkapan');
            $table->string('total');
            $table->string('nilai');
            $table->string('komentar');
            $table->string('jurnal');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submission');
    }
}
