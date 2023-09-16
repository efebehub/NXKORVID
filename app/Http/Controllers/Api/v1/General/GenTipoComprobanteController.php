<?php

namespace App\Http\Controllers\Api\v1\General;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenTipoComprobante;
use App\Http\Requests\Api\v1\General\GenTipoComprobanteStoreRequest;
use App\Http\Requests\Api\v1\General\GenTipoComprobanteUpdateRequest;
use App\Http\Resources\Api\v1\General\GenTipoComprobanteResource;
use App\Http\Resources\Api\v1\General\GenTipoComprobanteCollection;
use App\Filters\v1\General\GenTipoComprobanteFilter;

class GenTipoComprobanteController extends Controller
{
    public function index(Request $request) {

        


        $filter = new GenTipoComprobanteFilter();
        $queryItems = $filter->transform($request);

        //dd($queryItems[0]);

        if (count($queryItems) == 0 ) {
            $res = GenTipoComprobante::orderBy('modulo', 'ASC')->orderBy('descripcion', 'ASC')->get();
            return new GenTipoComprobanteCollection($res);
            
        } else {
            return new GenTipoComprobanteCollection(GenTipoComprobante::where($queryItems)->get());
            //var_dump($queryItems);
        }


    }
  
    public function show(Request $request, GenTipoComprobante $tiposcomprobante)
    {
        return new GenTipoComprobanteResource($tiposcomprobante);
    }
  
    public function store(GenTipoComprobanteStoreRequest $request) {

        $res = GenTipoComprobante::create($request->all());
        //return new GenTipoComprobanteResource($res);
    }
  
    public function update(GenTipoComprobanteUpdateRequest $request, GenTipoComprobante $tiposcomprobante) {
        $tiposcomprobante->update($request->all());
        //return new GenTipoComprobanteResource($GenTipoComprobante);
    }
  
    public function destroy(Request $request, GenTipoComprobante $tiposcomprobante)
    {
        $tiposcomprobante->delete();
        return SuccessResponse::getSuccessResponse(200, 'TipoComprobante deleted', 'The TipoComprobante was successfully deleted');
    }
  
}
