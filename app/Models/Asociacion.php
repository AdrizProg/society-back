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
        'imagen',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function userHasAsociacions(): HasMany
    // {
    //     return $this->hasMany(UserHasAsociacion::class);
    // }
    public function usersAsociados(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_has_asociacion');
    }
    

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
