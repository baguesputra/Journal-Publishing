<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->biginteger('penulis')->unsigned();
            $table->foreign('penulis')
                    ->references('id')->on('authors')
                    ->onDelete('cascade');
            $table->string('tgl_masuk');
            $table->string('hal');
            $table->string('tahun');
            $table->string('vol');
            $table->string('document');
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
        Schema::dropIfExists('archive');
    }
}
