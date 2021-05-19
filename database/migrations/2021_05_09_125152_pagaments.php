<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pagaments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagaments',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->foreignId('categoria_id')->nullable();
            $table->foreignId('compte_id')->nullable();
            $table->foreignId('curs_id')->nullable();
            $table->enum('nivell', ['ESO','BAT','CF','PR']);
            $table->string('titol');
            $table->mediumText('descripcio');
            $table->float('preu',6,2);
            $table->date('data_inici');
            $table->date('data_fi');
            $table->enum('estat', ['Actiu','Inactiu']);
            $table->timestamps();

       
            $table->foreign('categoria_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('compte_id')->references('id')->on('comptes')->onDelete('set null');
            $table->foreign('curs_id')->references('id')->on('cursos')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagaments');
    }
}
