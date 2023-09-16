<?php

namespace App\Models\Api\v1\General;

use App\Models\Api\v1\General\GenPais;
use Illuminate\Database\Eloquent\Model;

class GenProvincia extends Model
{

    protected $table = 'gen_provincia';
    protected $primaryKey = 'idprovincia';
    public $timestamps = false;

    protected $casts = [
        'idprovincia' => 'integer'
    ];

    protected $fillable = [
        'idprovincia',
        'descripcion',
        'codigo',
        'idpais',
    ];

    public function pais()
    {
        return $this->belongsTo(GenPais::class, 'idpais', 'idpais');
    }

    public function localidades()
    {
        return $this->hasMany(GenLocalidad::class, 'idprovincia', 'idprovincia');
    }
}
