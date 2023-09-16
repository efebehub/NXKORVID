<?php

namespace App\Filters\v1\General;

use Illuminate\http\Request;
use App\Filters\ApiFilter;

class GenEntidadFilter extends ApiFilter {

  protected $allowedParams = [
    'nombre' => ['lk'],
    'cuit' => ['eq'],
    'esCliente' => ['eq'],
    'esProveedor' => ['eq'],
    'esEntfin' => ['eq'],
    'esAgencia' => ['eq'],
    'esVendedor' => ['eq'],
    'esTransporte' => ['eq'],
    'esConcesionario' => ['eq'],
    'esEmpleado' => ['eq']
  ];

  protected $columnMap = [ 
    'esCliente' => 'escliente',
    'esProveedor' => 'esproveedor',
    'esEntfin' => 'esentfin',
    'esAgencia' => 'esagencia',
    'esVendedor' => 'esvendedor',
    'esTransporte' => 'estransporte',
    'esConcesionario' => 'esconcesionario',
    'esEmpleado' => 'esempleado'
  ];



}