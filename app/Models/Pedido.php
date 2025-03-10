<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado',
        'fechaEntregado',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fechaEntregado' => 'date',
        'user_id' => 'integer',
    ];

    // public function productoHasPedidos(): HasMany
    // {
    //     return $this->hasMany(ProductoHasPedido::class);
    // }
    public function producto()
    {
        return $this->belongsToMany(Producto::class, 'producto_has_pedidos');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
