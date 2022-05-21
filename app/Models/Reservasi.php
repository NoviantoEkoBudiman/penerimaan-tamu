<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = [
        'reservasi_status_id',
        'reservasi_email',
        'reservasi_is_read',
        'reservasi_is_kirim_bukti',
        'reservasi_nama',
        'reservasi_nama_instansi',
        'reservasi_kontak',
        'reservasi_provinsi',
        'reservasi_alamat',
        'reservasi_jadwal_berkunjung',
        'reservasi_topik',
        'reservasi_tujuan',
        'reservasi_jumlah_peserta',
        'reservasi_keterangan',
        'reservasi_no_surat',
        'reservasi_kepada',
        'reservasi_surat_permohonan_kunjungan'
    ];
}
