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
        Schema::create('kesediaan', function (Blueprint $table) {
            $table->increments('kesediaan_id');
            $table->text('kesediaan_keterangan');
            $table->enum('kesediaan_syarat_upload',['1','0']);
            $table->enum('kesediaan_aktif',['1','0']);
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
        Schema::dropIfExists('kesediaan');
    }
};
