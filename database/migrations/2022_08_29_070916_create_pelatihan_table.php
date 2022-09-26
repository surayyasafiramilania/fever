<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->integer('k_ketetanggaan');
            $table->float('exp');
            $table->float('akurasi');
            $table->boolean('aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pelatihan');
    }
};
