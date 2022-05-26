<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kesediaan;

class KesediaanTercentang extends Model
{
    use HasFactory;

    protected $primaryKey = "tercentang_id";

    protected $table = "kesediaan_tercentang";

    protected $fillable = [
        'reservasi_id',
        'kesediaan_id',
        'file_upload'
    ];

    public function kesediaan()
    {
        return $this->belongsTo(Kesediaan::class, 'kesediaan_id', 'kesediaan_id');
    }
}
