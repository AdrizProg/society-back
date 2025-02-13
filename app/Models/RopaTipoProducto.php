<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RopaTipoProducto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tallas',
        'color',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    // public function ropaHasProductos(): HasMany
    // {
    //     return $this->hasMany(RopaHasProducto::class);
    // }
    public function producto(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'ropa_has_producto');
    }
}
