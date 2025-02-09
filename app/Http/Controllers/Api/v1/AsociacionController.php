<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Asociacion;
use Illuminate\Http\Request;

class AsociacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $asociacion = Asociacion::class;
}
