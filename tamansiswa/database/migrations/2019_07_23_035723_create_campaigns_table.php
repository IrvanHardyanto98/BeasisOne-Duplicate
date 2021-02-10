<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id_campaign');
            $table->string('title',50)->nullable();
            $table->string('video')->nullable();
            $table->integer('target_donation');
            $table->integer('start_semester');
            $table->integer('end_semester');
            $table->date('deadline');
            $table->integer('current_donation');
            $table->string('url_transkrip')->nullable();
            $table->string('url_sr')->nullable(); // surat rekomendasi
            $table->string('url_po')->nullable(); //pendapatan orangtua
            $table->longText('story')->nullable();
            $table->boolean('tipe');
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->integer('id_student');
            $table->integer('donor_counts');
            $table->integer('adopsi_counts');
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
        Schema::dropIfExists('campaigns');
    }
}
