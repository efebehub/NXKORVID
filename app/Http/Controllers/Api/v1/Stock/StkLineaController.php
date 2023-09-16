<?php

namespace App\Http\Controllers\Api\v1\Stock;

use App\Models\Api\v1\Stock\StkLinea;
use App\Http\Requests\Api\v1\Stock\StkLineaStoreRequest;
use App\Http\Requests\Api\v1\Stock\StkLineaUpdateRequest;
use App\Http\Resources\Api\v1\Stock\StkLineaCollection;
use App\Http\Resources\Api\v1\Stock\StkLineaResource;
use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StkLineaController extends Controller
{
    public function index(Request $request) {
        $res = StkLinea::all();
        return new StkLineaCollection($res);
    }
  
      public function show(Request $request, StkLinea $linea)
      {
          return new StkLineaResource($linea);
      }
  
    public function store(StkLineaStoreRequest $request) {

        //dd($request->all());

        $res = StkLinea::create($request->all());
        //return new StkLineaResource($res);
    }
  
    public function update(StkLineaUpdateRequest $request, StkLinea $linea) {
        $linea->update($request->all());
        //return new StkLineaResource($StkLinea);
    }
  
    public function destroy(Request $request, StkLinea $linea)
    {
        $linea->delete();
        return SuccessResponse::getSuccessResponse(200, 'linea deleted', 'The linea was successfully deleted');
    }
  
}
