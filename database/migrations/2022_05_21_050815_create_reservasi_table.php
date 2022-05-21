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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->increments('id_reservasi');
            $table->tinyInteger('reservasi_status_id')->length(1);
            $table->tinyInteger('reservasi_jenis_akun_id')->length(1);
            $table->string('reservasi_nama')->length(50);
            $table->string('reservasi_email')->length(35);
            $table->string('reservasi_kontak')->length(14);
            $table->text('reservasi_maksud');
            $table->tinyInteger('reservasi_is_read')->length(1);
            $table->tinyInteger('reservasi_is_kirim_bukti')->length(1);
            $table->date('reservasi_tanggal_berkunjung');
            $table->time('reservasi_jam_berkunjung');
            $table->text('reservasi_topik')->length(100);
            $table->text('reservasi_tujuan')->length(100);
            $table->tinyInteger('reservasi_jumlah_peserta')->length(4);
            $table->text('reservasi_keterangan');
            $table->string('reservasi_no_surat')->length(20);
            $table->string('reservasi_kepada')->length(50);
            $table->string('reservasi_surat_permohonan_kunjungan')->length(100);
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
        Schema::dropIfExists('reservasi');
    }
};
