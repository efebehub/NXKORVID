<?php

namespace App\Http\Resources\Api\v1\General;

use Illuminate\Http\Resources\Json\JsonResource;

class GenEntidadResource extends JsonResource
{
    public static $wrap = null;
  //'provincia' => $this->resource->provincia,
    public function toArray($request)
    {
      return [
          'type' => 'Entidad',  
          'idEntidad'   => $this->resource->identidad,
          'nombre' => $this->resource->nombre, 
          'domicilio'=> $this->resource->domicilio, 
          'telefono'=> $this->resource->telefono, 
          'fax'=> $this->resource->fax, 
          'mail'=> $this->resource->mail, 
          'cuit'=> $this->resource->cuit, 
          'iibb'=> $this->resource->iibb, 
          'fechaNacimiento'=> $this->resource->fechanacimiento, 
          'cbu'=> $this->resource->cbu, 
          'esCliente'=> $this->resource->escliente, 
          'esProveedor'=> $this->resource->esproveedor, 
          'esEntfin'=> $this->resource->esentfin, 
          'esAgencia'=> $this->resource->esagencia, 
          'esVendedor'=> $this->resource->esvendedor, 
          'esConcesionario'=> $this->resource->esconcesionario, 
          'esTransporte'=> $this->resource->estransporte, 
          'esEmpleado'=> $this->resource->esempleado, 
          'idTipoIva'=> $this->resource->idtipoiva, 
          'idListaPrecios'=> $this->resource->idlistaprecios, 
          'idVendedor'=> $this->resource->idvendedor, 
          'idLocalidad' => $this->resource->idlocalidad, 
          'idCuentaContable' => $this->resource->idcuentacontable,
          'tipoIva'=> $this->resource->tipoiva, 
          'listaPrecios'=> $this->resource->listaprecios, 
          'vendedor'=> $this->resource->vendedor, 
          'localidad' => $this->resource->localidad, 
          'provincia' => $this->resource->localidad->provincia, 
          'pais' => $this->resource->localidad->provincia->pais, 
          'cuentaContable' => $this->resource->cuentacontable
      ];
    }
}
