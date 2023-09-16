<?php

namespace App\Models\Api\v1\General;

use Illuminate\Database\Eloquent\Model;

class GenImpuesto extends Model
{
    protected $table = 'gen_impuesto';
    protected $primaryKey = 'idimpuesto';
    public $timestamps = false;

    protected $casts = [
        'idimpuesto' => 'integer'
    ];

    protected $fillable = [
        'idimpuesto',
        'descripcion',
        'porcentaje',
        'compras',
        'ventas',
        'codigowsfe',
        'idcuentacontabled',
        'idcuentacontableh',
    ];

    public function cuentacontabled()
    {
        return $this->belongsTo(ConPlanDeCuentas::class, 'idcuentacontabled', 'idcuentacontable');
    }

    public function cuentacontableh()
    {
        return $this->belongsTo(GenTalonario::class, 'idcuentacontableh', 'idcuentacontable');
    }

    
}
