<?php

namespace App\Models\Api\v1\General;

use Illuminate\Database\Eloquent\Model;

class GenNave extends Model
{
    protected $table = 'gen_nave';
    protected $primaryKey = 'idnave';
    public $timestamps = false;

    protected $casts = [
        'idnave' => 'integer'
    ];

    protected $fillable = [
        'idnave',
        'descripcion'
    ];

    public function sectores()
    {
        return $this->hasMany(GenSector::class, 'idnave', 'idnave');
    }

    
}
