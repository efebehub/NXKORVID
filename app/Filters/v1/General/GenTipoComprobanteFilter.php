<?php

namespace App\Filters\v1\General;

use Illuminate\http\Request;
use App\Filters\ApiFilter;

class GenTipoComprobanteFilter extends ApiFilter {

  protected $allowedParams = [
    'modulo' => ['eq'],
    'fondos' => ['eq'],
    'ctacte' => ['eq'],
    'stock' => ['eq'],
    'asiento' => ['eq'],
    'iva' => ['eq'],
    'tipoComprobante' => ['eq'],
    'codigoWsfe' => ['eq'],
  ];

  protected $columnMap = [ 
    'tipoComprobante' => 'tipocomprobante',
    'codigoWsfe' => 'codigowsfe'
  ];



}