<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataCara extends Model
{
    use HasFactory;

    protected $table = 'tata_cara';

    protected $primaryKey = 'id_tata_cara';

    protected $fillable = [
        'tata_cara_keterangan',
        'tata_cara_aktif',
        'tata_cara_upload'
    ];
}
