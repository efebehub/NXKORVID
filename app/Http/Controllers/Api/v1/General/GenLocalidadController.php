<?php

namespace App\Http\Controllers\Api\v1\General;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenLocalidad;
use App\Http\Requests\Api\v1\General\GenLocalidadStoreRequest;
use App\Http\Requests\Api\v1\General\GenLocalidadUpdateRequest;
use App\Http\Resources\Api\v1\General\GenLocalidadResource;
use App\Http\Resources\Api\v1\General\GenLocalidadCollection;

class GenLocalidadController extends Controller
{
    public function index(Request $request) {

        $res = GenLocalidad::orderBy('idprovincia', 'ASC')->orderBy('descripcion', 'ASC')->get();
        return new GenLocalidadCollection($res);

    }
  
    public function show(Request $request, GenLocalidad $localidade)
    {
        return new GenLocalidadResource($localidade);
    }
  
    public function store(GenLocalidadStoreRequest $request) {

        $res = GenLocalidad::create($request->all());
        //return new GenLocalidadResource($res);
    }
  
    public function update(GenLocalidadUpdateRequest $request, GenLocalidad $localidade) {
        $localidade->update($request->all());
        //return new GenLocalidadResource($GenLocalidad);
    }
  
    public function destroy(Request $request, GenLocalidad $localidade)
    {
        $localidade->delete();
        return SuccessResponse::getSuccessResponse(200, 'Localidad deleted', 'The Localidad was successfully deleted');
    }
  
}
