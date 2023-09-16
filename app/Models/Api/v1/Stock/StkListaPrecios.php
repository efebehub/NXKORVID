<?php

namespace App\Models\Api\v1\Stock;

use Illuminate\Database\Eloquent\Model;

class StkListaPrecios extends Model
{
    protected $table = 'stk_listaprecios';
    protected $primaryKey = 'idlistaprecios';
  
    protected $casts = [
        'idlistaprecios' => 'integer'
    ];

    protected $fillable = [
        'idlistaprecios',
        'descripcion',
        'moneda',
        'sel'
    ];

}
