<?php

namespace App\Http\Controllers\Api\v1\General;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenMarca;
use App\Http\Requests\Api\v1\General\GenMarcaStoreRequest;
use App\Http\Requests\Api\v1\General\GenMarcaUpdateRequest;
use App\Http\Resources\Api\v1\General\GenMarcaResource;
use App\Http\Resources\Api\v1\General\GenMarcaCollection;


class GenMarcaController extends Controller
{
    public function index(Request $request) {
        $res = GenMarca::all();
        return new GenMarcaCollection($res);
    }
  
      public function show(Request $request, GenMarca $marca)
      {
          return new GenMarcaResource($marca);
      }
  
    public function store(GenMarcaStoreRequest $request) {
        $res = GenMarca::create($request->all());
        //return new GenMarcaResource($res);
    }
  
    public function update(GenMarcaUpdateRequest $request, GenMarca $marca) {
        $marca->update($request->all());
        //return new GenMarcaResource($GenMarca);
    }
  
    public function destroy(Request $request, GenMarca $marca)
    {
        $marca->delete();
        return SuccessResponse::getSuccessResponse(200, 'Marca deleted', 'The Marca was successfully deleted');
    }
  
}
