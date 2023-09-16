<?php

namespace App\Models\Api\v1\Stock;

use Illuminate\Database\Eloquent\Model;

class StkFamilia extends Model
{
    protected $table = 'stk_familia';
    protected $primaryKey = 'idfamilia';
  
    protected $casts = [
        'idfamilia' => 'integer'
    ];

    protected $fillable = [
        'idfamilia',
        'descripcion',
        'idlinea'
    ];

    public function linea()
    {
        return $this->belongsTo(StkLinea::class, 'idlinea', 'idlinea');
    }

}
