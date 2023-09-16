<?php

namespace App\Models\Api\v1\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenTipoIva extends Model
{
    use HasFactory;

    protected $table = 'gen_tipoiva';
    protected $primaryKey = 'idtipoiva';
    public $timestamps = false;

    protected $casts = [
        'idtipoiva' => 'integer'
    ];

    protected $fillable = [
        'idtipoiva',
        'descripcion'
    ];


    public function entidades()
    {
        return $this->hasMany(GenEntidad::class, 'idtipoiva', 'idtipoiva');
    }
}
