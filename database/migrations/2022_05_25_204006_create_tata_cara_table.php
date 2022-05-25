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
        Schema::create('tata_cara', function (Blueprint $table) {
            $table->increments('tata_cara_id');
            $table->text('tata_cara_keterangan');
            $table->enum('tata_cara_aktif',['1','0']);
            $table->enum('tata_cara_upload',['1','0']);
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
        Schema::dropIfExists('tata_cara');
    }
};
