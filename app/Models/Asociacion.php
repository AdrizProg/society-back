<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Asociacion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nombre',
        'nif',
        'direccion',
        'descripcion',
        'imagenPrincipal',
        'aprobados',
        'user_id',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'aprobados' => 'boolean',
        'user_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_has_asociacions');
    }

    public function usersAsociados(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_asociacion');
    }


    public function producto()
    {
        return $this->hasMany(Producto::class);
    }
}
