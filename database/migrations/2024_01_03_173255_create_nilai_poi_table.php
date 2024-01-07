<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_poi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_siswa');
            $table->foreign('kode_siswa')->references('id')->on('siswa')->onDelete('cascade');
            $table->enum('semester', array('1(Ganjil)', '2(Genap)'));
            $table->string('nilai_principled');
            $table->string('nilai_balanced');
            $table->string('nilai_skill');
            $table->string('nilai_product');
            $table->text('comment_indonesian');
            $table->text('comment_english');
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
        Schema::dropIfExists('nilai_poi');
    }
}
