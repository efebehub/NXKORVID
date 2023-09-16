<?php

namespace App\Models\Api\v1\General;

use Illuminate\Database\Eloquent\Model;

class GenSector extends Model
{
    protected $table = 'gen_sector';
    protected $primaryKey = 'idsector';
    public $timestamps = false;

    protected $casts = [
        'idsector' => 'integer'
    ];

    protected $fillable = [
        'idsector',
        'descripcion',
        'idnave'
    ];

    public function nave()
    {
        return $this->belongsTo(GenNave::class, 'idnave', 'idnave');
    }

    
}
