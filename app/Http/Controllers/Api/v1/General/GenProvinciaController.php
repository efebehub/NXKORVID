<?php

namespace App\Http\Controllers\Api\v1\General;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenProvincia;
use App\Http\Requests\Api\v1\General\GenProvinciaStoreRequest;
use App\Http\Requests\Api\v1\General\GenProvinciaUpdateRequest;
use App\Http\Resources\Api\v1\General\GenProvinciaResource;
use App\Http\Resources\Api\v1\General\GenProvinciaCollection;

class GenProvinciaController extends Controller
{
    public function index(Request $request) {

        $res = GenProvincia::orderBy('descripcion', 'ASC')->get();
        return new GenProvinciaCollection($res);
    }
  
      public function show(Request $request, GenProvincia $provincia)
      {
          return new GenProvinciaResource($provincia);
      }
  
    public function store(GenProvinciaStoreRequest $request) {
        $res = GenProvincia::create($request->all());
        //return new GenProvinciaResource($res);
    }
  
    public function update(GenProvinciaUpdateRequest $request, GenProvincia $provincia) {
        $provincia->update($request->all());
       // return new GenProvinciaResource($provincia);
    }
  
    public function destroy(Request $request, GenProvincia $provincia)
    {
        $provincia->delete();
        return SuccessResponse::getSuccessResponse(200, 'Provincia deleted', 'The Provincia was successfully deleted');
    }
  
}
