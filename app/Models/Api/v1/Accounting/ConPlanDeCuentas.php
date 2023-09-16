<?php

namespace App\Models\Api\v1\Accounting;

use Illuminate\Database\Eloquent\Model;

class ConPlanDeCuentas extends Model
{
    protected $table = 'con_plandecuentas';
    protected $primaryKey = 'idcuentacontable';
  
    protected $casts = [
        'idcuentacontable' => 'integer'
    ];

    protected $fillable = [
        'idcuentacontable',
        'descripcion',
        'idcuentapadre',
        'asiento',
        'nivel',
        'indexacion',
        'presupuesto'
    ];

    public function cuentapadre()
    {
        return $this->belongsTo(ConPlanDeCuentas::class, 'idcuentapadre', 'idcuentacontable');
    }
 /*
   
    public function comprobantes()
    {
        return $this->hasMany(GenLocalidad::class, 'identidad', 'identidad');
    }*/
}
