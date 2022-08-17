<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuarto
 *
 * @property $id
 * @property $titulo
 * @property $descripcion
 * @property $precio
 * @property $ubicacion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cuarto extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'descripcion' => 'required',
		'precio' => 'required',
		'ubicacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','descripcion','precio','ubicacion'];



}
