<?php

namespace App\Models\Api\v1\General;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenLocalidad extends Model
{
    use HasFactory;

    protected $table = 'gen_localidad';
    protected $primaryKey = 'idlocalidad';
    public $timestamps = false;
    
    protected $casts = [
        'idlocalidad' => 'integer'
    ];

    protected $fillable = [
        'idlocalidad',
        'descripcion',
        'cp',
        'idprovincia',
    ];

    public function provincia()
    {
        return $this->belongsTo(GenProvincia::class, 'idprovincia', 'idprovincia');
    }
}
