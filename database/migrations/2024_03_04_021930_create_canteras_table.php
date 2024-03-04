<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('canteras', function (Blueprint $table) {
            $table->increments('id_cantera');
            $table->integer('id_sujeto')->unsigned();
            $table->string('direccion');
            $table->enum('mineral',['mármol','pórfido','caolín','magnesita','arena','pizarra','arcilla','caliza','yeso','puzolanas','turbas','Otro']);
            $table->string('otro_mineral');
            $table->foreign('id_sujeto')->references('id_sujeto')->on('sujeto_pasivos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canteras');
    }
};
