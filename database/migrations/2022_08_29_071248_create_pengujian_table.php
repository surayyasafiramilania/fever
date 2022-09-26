<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengujian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelatihan_id')->constrained('pelatihan');
            $table->float('akurasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengujian');
    }
};
