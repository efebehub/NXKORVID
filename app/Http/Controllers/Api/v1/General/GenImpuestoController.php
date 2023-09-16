<?php

namespace App\Http\Controllers\Api\v1\General;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenImpuesto;
use App\Http\Requests\Api\v1\General\GenImpuestoStoreRequest;
use App\Http\Requests\Api\v1\General\GenImpuestoUpdateRequest;
use App\Http\Resources\Api\v1\General\GenImpuestoResource;
use App\Http\Resources\Api\v1\General\GenImpuestoCollection;

class GenImpuestoController extends Controller
{
    public function index(Request $request) {

        $res = GenImpuesto::orderBy('descripcion', 'ASC')->get();
        return new GenImpuestoCollection($res);

    }
  
    public function show(Request $request, GenImpuesto $impuesto)
    {
        return new GenImpuestoResource($impuesto);
    }
  
    public function store(GenImpuestoStoreRequest $request) {

        $res = GenImpuesto::create($request->all());
        //return new GenImpuestoResource($res);
    }
  
    public function update(GenImpuestoUpdateRequest $request, GenImpuesto $impuesto) {
        $impuesto->update($request->all());
        //return new GenImpuestoResource($GenImpuesto);
    }
  
    public function destroy(Request $request, GenImpuesto $impuesto)
    {
        $impuesto->delete();
        return SuccessResponse::getSuccessResponse(200, 'Impuesto deleted', 'The Impuesto was successfully deleted');
    }
  
}
