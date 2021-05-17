<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKorsniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korsniks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipkorsnika_id');
            $table->string('ImePrezime');
            $table->string('Email')->unique();
            $table->string('JMBG')->nullable();
            $table->string('KorisnickoIme')->nullable();
            $table->string('Sifra')->nullable();
            $table->string('Foto')->nullable();
            $table->index('tipkorsnika_id');
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
        Schema::dropIfExists('korsniks');
    }
}
