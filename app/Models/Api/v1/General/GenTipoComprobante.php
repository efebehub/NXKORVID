<?php

namespace App\Models\Api\v1\General;

use App\Models\Api\v1\Accounting\ConPlanDeCuentas;
use Illuminate\Database\Eloquent\Model;

class GenTipoComprobante extends Model
{
    protected $table = 'gen_tipocomprobante';
    protected $primaryKey = 'idtipocomprobante';
    public $timestamps = false;

    protected $casts = [
        'idtipocomprobante' => 'integer'
    ];

    protected $fillable = [
        'idtipocomprobante',
        'descripcion',
        'modulo',
        'fondos',
        'ctacte',
        'stock',
        'asiento',
        'iva',
        'tipocomprobante',
        'idtalonario',
        'codigowsfe',
        'idcuentacontabled',
        'idcuentacontableh',
    ];

    public function talonario()
    {
        return $this->belongsTo(GenTalonario::class, 'idtalonario', 'idtalonario');
    }

    public function cuentacontabled()
    {
        return $this->belongsTo(ConPlanDeCuentas::class, 'idcuentacontabled', 'idcuentacontable');
    }

    public function cuentacontableh()
    {
        return $this->belongsTo(GenTalonario::class, 'idcuentacontableh', 'idcuentacontable');
    }

    
}
