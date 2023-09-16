<?php

namespace App\Models\Api\v1\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenTalonario extends Model
{
    protected $table = 'gen_talonario';
    protected $primaryKey = 'idtalonario';
    public $timestamps = false;

    protected $casts = [
        'idtalonario' => 'integer'
    ];

    protected $fillable = [
        'idtalonario',
        'descripcion',
        'numero1',
        'numero2',
        'letra'
    ];
    
}
