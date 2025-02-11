<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'isRopa',
        'asociacion_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'precio' => 'decimal:2',
        'asociacion_id' => 'integer',
    ];

    public function ropaHasProductos(): HasMany
    {
        return $this->hasMany(RopaHasProducto::class);
    }

    public function imagens(): HasMany
    {
        return $this->hasMany(Imagen::class);
    }

    public function categoriaHasProductos(): HasMany
    {
        return $this->hasMany(CategoriaHasProducto::class);
    }

    public function productoHasPedidos(): HasMany
    {
        return $this->hasMany(ProductoHasPedido::class);
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }

    public function asociacion(): BelongsTo
    {
        return $this->belongsTo(Asociacion::class);
    }
}
