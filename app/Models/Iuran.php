<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Iuran extends Model
{
    protected $table = 'iurans';

    protected $fillable = [
        'id_wargas', 'bulan', 'jumlah_iuran', 'status'
    ];

    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'id_wargas');
    }
}
