<?php

namespace App\Models\Api\v1\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StkLinea extends Model
{
    protected $table = 'stk_linea';
    protected $primaryKey = 'idlinea';
  
    protected $casts = [
        'idlinea' => 'integer'
    ];

    protected $fillable = [
        'idlinea',
        'descripcion'
    ];

}
