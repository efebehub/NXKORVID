<?php

namespace App\Http\Controllers\Api\v1\General;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenEntidad;
use App\Http\Requests\Api\v1\General\GenEntidadStoreRequest;
use App\Http\Requests\Api\v1\General\GenEntidadUpdateRequest;
use App\Http\Resources\Api\v1\General\GenEntidadResource;
use App\Http\Resources\Api\v1\General\GenEntidadCollection;
use App\Filters\v1\General\GenEntidadFilter;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class GenEntidadController extends Controller
{
    public function index(Request $request) {

        $filter = new GenEntidadFilter();
        $queryItems = $filter->transform($request);

        //dd($queryItems[0]);

        if (count($queryItems) == 0 ) {
            $res = GenEntidad::orderBy('nombre', 'ASC')->get();
            return new GenEntidadCollection($res);
            
        } else {
            return new GenEntidadCollection(GenEntidad::where($queryItems)->get());
            //var_dump($queryItems);
        }

    }
  
    public function show(Request $request, GenEntidad $Entidade)
    {
        return new GenEntidadResource($Entidade);
    }
  
    public function store(GenEntidadStoreRequest $request) {

        $res = GenEntidad::create($request->all());
        //return new GenEntidadResource($res);
    }
  
    public function update(GenEntidadUpdateRequest $request, GenEntidad $Entidade) {
        $Entidade->update($request->all());
        //return new GenEntidadResource($GenEntidad);
    }
  
    public function destroy(Request $request, GenEntidad $Entidade)
    {
        $Entidade->delete();
        return SuccessResponse::getSuccessResponse(200, 'Entidad deleted', 'The Entidad was successfully deleted');
    }
  
}
