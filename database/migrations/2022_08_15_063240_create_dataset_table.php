<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->tinyInteger('jenis_kelamin');
            $table->string('umur');
            $table->tinyInteger('g1');
            $table->tinyInteger('g2');
            $table->tinyInteger('g3');
            $table->tinyInteger('g4');
            $table->tinyInteger('g5');
            $table->tinyInteger('g6');
            $table->tinyInteger('g7');
            $table->tinyInteger('g8');
            $table->tinyInteger('g9');
            $table->tinyInteger('g10');
            $table->tinyInteger('g11');
            $table->tinyInteger('g12');
            $table->tinyInteger('g13');
            $table->tinyInteger('g14');
            $table->tinyInteger('g15');
            $table->tinyInteger('g16');
            $table->tinyInteger('g17');
            $table->tinyInteger('g18');
            $table->tinyInteger('g19');
            $table->tinyInteger('g20');
            $table->tinyInteger('g21');
            $table->tinyInteger('g22');
            $table->tinyInteger('g23');
            $table->tinyInteger('g24');
            $table->tinyInteger('g25');
            $table->tinyInteger('g26');
            $table->tinyInteger('g27');
            $table->tinyInteger('g28');
            $table->tinyInteger('g29');
            $table->foreignId('diagnosa_id')->constrained('diagnosa');
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
        Schema::dropIfExists('dataset');
    }
};
