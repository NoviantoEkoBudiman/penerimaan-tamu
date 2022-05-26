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
        Schema::create('kesediaan_tercentang', function (Blueprint $table) {
            $table->increments('tercentang_id');
            $table->foreignId('reservasi_id');
            $table->foreignId('kesediaan_id');
            $table->string('file_upload')->length('100')->nullable();
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
        Schema::dropIfExists('kesediaan_tercentang');
    }
};
