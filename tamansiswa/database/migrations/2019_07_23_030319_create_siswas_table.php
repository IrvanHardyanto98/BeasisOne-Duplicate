<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->bigIncrements('id_student');
            $table->string('username',20);
            $table->string('password',70);
            $table->string('email',30);
            $table->string('nama_lengkap',50)->nullable();
            $table->date('dob')->nullable();
            $table->string('pob',50)->nullable();
            $table->boolean('jenis_kelamin')->nullable();
            $table->string('universitas',50)->nullable();
            $table->string('jurusan',50)->nullable();
            $table->string('nim',20)->nullable();
            $table->float('ipk')->nullable();
            $table->string('alamat',70)->nullable();
            $table->string('provinsi',20)->nullable();
            $table->string('kabupaten',20)->nullable();
            $table->string('kecamatan',20)->nullable();
            $table->string('kelurahan',20)->nullable();
            $table->string('kodepos',10)->nullable();
            $table->string('rt',5)->nullable();
            $table->string('rw',5)->nullable();
            $table->string('notelp',20)->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('siswas');
    }
}
