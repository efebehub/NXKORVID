<?php

namespace App\Models\Api\v1\General;

use Illuminate\Database\Eloquent\Model;

class GenMarca extends Model
{
    protected $table = 'gen_marca';
    protected $primaryKey = 'idmarca';
    public $timestamps = false;

    protected $casts = [
        'idmarca' => 'integer'
    ];

    protected $fillable = [
        'idmarca',
        'descripcion'
    ];

    /*
    public function maquinarias()
    {
        return $this->hasMany(GenProvincia::class, 'idmarca', 'idmarca');
    }*/

    
}
