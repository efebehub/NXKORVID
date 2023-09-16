<?php

namespace App\Http\Controllers\Api\v1\General;
    
use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenTipoIva;
use App\Http\Requests\Api\v1\General\GenTipoIvaStoreRequest;
use App\Http\Requests\Api\v1\General\GenTipoIvaUpdateRequest;
use App\Http\Resources\Api\v1\General\GenTipoIvaResource;
use App\Http\Resources\Api\v1\General\GenTipoIvaCollection;

class GenTipoIvaController extends Controller
{

    public function index(Request $request) {
        $res = GenTipoIva::all();
        return new GenTipoIvaCollection($res);
    }
    
        public function show(Request $request, GenTipoIva $tiposiva)
        {
            return new GenTipoIvaResource($tiposiva);
        }
    
    public function store(GenTipoIvaStoreRequest $request) {
        $res = GenTipoIva::create($request->all());
        //return new GenTipoIvaResource($res);
    }
    
    public function update(GenTipoIvaUpdateRequest $request, GenTipoIva $tiposiva) {
        $tiposiva->update($request->all());
        //return new GenTipoIvaResource($GenTipoIva);
    }
    
    public function destroy(Request $request, GenTipoIva $tiposiva)
    {
        $tiposiva->delete();    
        return SuccessResponse::getSuccessResponse(200, 'TipoIva deleted', 'The TipoIva was successfully deleted');
    }
    
}
    