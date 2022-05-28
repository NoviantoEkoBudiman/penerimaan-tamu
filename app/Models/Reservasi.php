<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $primaryKey = 'reservasi_id';

    protected $fillable = [
        'reservasi_status',
        'reservasi_email',
        'reservasi_nama_dinas',
        'reservasi_kontak',
        'reservasi_asal_provinsi',
        'reservasi_alamat',
        'reservasi_jadwal_berkunjung',
        'reservasi_topik',
        'reservasi_dinas_tujuan',
        'reservasi_jumlah_peserta',
        'reservasi_keterangan',
        'reservasi_no_surat',
        'reservasi_kepada',
        'reservasi_surat_permohonan_kunjungan'
    ];
}
