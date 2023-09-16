<?php

namespace App\Models\Api\v1\General;

use App\Models\Api\v1\Accounting\ConPlanDeCuentas;
use App\Models\Api\v1\Stock\StkListaPrecios;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenEntidad extends Model
{
    use HasFactory;

    protected $table = 'gen_entidad';
    protected $primaryKey = 'identidad';

    protected $casts = [
        'identidad' => 'integer'
    ];

    protected $fillable = [
        'identidad',
        'nombre',
        'domicilio',
        'telefono',
        'fax',
        'mail',
        'cuit',
        'iibb',
        'fechanacimiento',
        'cbu',
        'escliente',
        'esproveedor',
        'esentfin',
        'esagencia',
        'esvendedor',
        'esconcesionario',
        'estransporte',
        'esempleado',
        'idtipoiva',
        'idlistaprecios',
        'idvendedor',
        'idlocalidad',
        'idcuentacontable'
        

    ];

    public function tipoiva()
    {
        return $this->belongsTo(GenTipoIva::class, 'idtipoiva', 'idtipoiva');
    }
    public function listaDePrecios()
    {
        return $this->belongsTo(StkListaPrecios::class, 'idlistaprecios', 'idlistaprecios');
    }
    public function vendedor()
    {
        return $this->belongsTo(GenEntidad::class, 'idvendedor', 'identidad');
    }
    public function localidad()
    {
        return $this->belongsTo(GenLocalidad::class, 'idlocalidad', 'idlocalidad');
    }
    public function cuentaContable()
    {
        return $this->belongsTo(ConPlanDeCuentas::class, 'idcuentacontable', 'idcuentacontable');
    }
    /*
    public function comprobantes()
    {
        return $this->hasMany(GenLocalidad::class, 'identidad', 'identidad');
    }
    */
}
