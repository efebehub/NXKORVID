<?php

namespace App\Http\Controllers\Api\v1\Stock;

use App\Models\Api\v1\Stock\StkListaPrecios;
use App\Http\Requests\Api\v1\Stock\StkListaPreciosStoreRequest;
use App\Http\Requests\Api\v1\Stock\StkListaPreciosUpdateRequest;
use App\Http\Resources\Api\v1\Stock\StkListaPreciosCollection;
use App\Http\Resources\Api\v1\Stock\StkListaPreciosResource;
use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StkListaPreciosController extends Controller
{
    public function index(Request $request) {
        $res = StkListaPrecios::all();
        return new StkListaPreciosCollection($res);
    }
  
      public function show(Request $request, StkListaPrecios $listadeprecio)
      {
          return new StkListaPreciosResource($listadeprecio);
      }
  
    public function store(StkListaPreciosStoreRequest $request) {

        //dd($request->all());

        $res = StkListaPrecios::create($request->all());
        //return new StkListaPreciosResource($res);
    }
  
    public function update(StkListaPreciosUpdateRequest $request, StkListaPrecios $listadeprecio) {
        $listadeprecio->update($request->all());
        //return new StkListaPreciosResource($StkListaPrecios);
    }
  
    public function destroy(Request $request, StkListaPrecios $listadeprecio)
    {
        $listadeprecio->delete();
        return SuccessResponse::getSuccessResponse(200, 'listadeprecio deleted', 'The listadeprecio was successfully deleted');
    }
  
}
