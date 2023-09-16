<?php

namespace App\Models\Api\v1\Production\TypeCut;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCut extends Model
{
    use HasFactory;

    protected $table = 'pro_tipocorte';
    protected $primaryKey = 'idtipocorte';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'idtipocorte' => 'integer'
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idtipocorte',
        'descripcion'
    ];
}
