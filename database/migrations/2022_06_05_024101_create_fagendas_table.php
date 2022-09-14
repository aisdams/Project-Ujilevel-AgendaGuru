<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFagendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fagendas', function (Blueprint $table) {
                $table->id();
                $table->BigInteger('namaguru_id');
                $table->BigInteger('mapel_id');       
                $table->string('materi');
                $table->enum('jenispelajaran', ['Online','Ofline']);
                $table->string('linkpembelajaran');
                $table->string('absensisiswa');
                $table->BigInteger('namakelas_id');
                $table->string('documentasi');
                $table->string('keterangan');
                $table->string('jampembelajaran');
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
        Schema::dropIfExists('fagendas');
    }
}
