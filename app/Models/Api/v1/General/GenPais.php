<?php

namespace App\Models\Api\v1\General;

use Illuminate\Database\Eloquent\Model;

class GenPais extends Model
{

    protected $table = 'gen_pais';
    protected $primaryKey = 'idpais';
    public $timestamps = false;

    protected $casts = [
        'idpais' => 'integer'
    ];

    protected $fillable = [
        'idpais',
        'descripcion'
    ];

    public function provincias()
    {
        return $this->hasMany(GenProvincia::class, 'idpais', 'idpais');
    }

    
}
