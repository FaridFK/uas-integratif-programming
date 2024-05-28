<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warga extends Model
{
    protected $table = 'wargas';

    protected $fillable = ['nama', 'alamat'];

    public function iurans(): HasMany
    {
        return $this->hasMany(Iuran::class, 'id_wargas');
    }
}
