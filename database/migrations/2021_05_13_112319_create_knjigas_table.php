<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnjigasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knjigas', function (Blueprint $table) {
            $table->id();
            $table->string('naslov');
            $table->integer('brojStrana');

            $table->foreignId('pismo_id')->constrained();
            $table->foreignId('jezik_id')->constrained();
            $table->foreignId('povez_id')->constrained();
            $table->foreignId('format_id')->constrained();
            $table->foreignId('izdavac_id')->constrained();
            $table->date('datumIzdavanja');
            $table->char('isbn',20);
            $table->integer('ukupnoPrimjeraka');
            $table->integer('izdatoPrimjeraka');
            $table->integer('rezervisanoPrimjeraka');
            $table->text('sadrzaj');
            $table->timestamps();

            $table->foreignId('pismo_id')->constrained()->onDelete('cascade');
            $table->foreignId('jezik_id')->constrained()->onDelete('cascade');
            $table->foreign('povez_id')->references('id')->on('povezs')->onDelete('cascade');
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');
            $table->foreign('izdavac_id')->references('id')->on('izdavacs')->onDelete('cascade');
        });
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('knjigas');
    }
}
