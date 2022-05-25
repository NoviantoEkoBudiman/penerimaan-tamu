<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesediaan extends Model
{
    use HasFactory;

    protected $table = "kesediaan";

    protected $primaryKey = "kesediaan_id";

    protected $fillable = [
        'kesediaan_keterangan',
        'kesediaan_syarat_upload'
    ];
}
