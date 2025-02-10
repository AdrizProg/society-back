<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asociacion extends Model
{
    /** @use HasFactory<\Database\Factories\AsociacionFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'nif',
        'direccion',
        'imagen',
        'user_id',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
