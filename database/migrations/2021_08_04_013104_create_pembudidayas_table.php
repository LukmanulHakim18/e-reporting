<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembudidayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembudidaya', function (Blueprint $table) {
            $table->id('pembudidaya_id');
            $table->string('nama_pembudidaya');
            $table->string('nik');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['Pria','Wanita'])->default('Pria');
            $table->string('alamat');
            $table->string('contact');
            $table->integer('desa_id');
            $table->char('is_deleted', 1)->default('0');
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
        Schema::dropIfExists('pembudidayas');
    }
}
