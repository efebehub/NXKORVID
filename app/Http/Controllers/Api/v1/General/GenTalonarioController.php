<?php

namespace App\Http\Controllers\Api\v1\General;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenTalonario;
use App\Http\Requests\Api\v1\General\GenTalonarioStoreRequest;
use App\Http\Requests\Api\v1\General\GenTalonarioUpdateRequest;
use App\Http\Resources\Api\v1\General\GenTalonarioResource;
use App\Http\Resources\Api\v1\General\GenTalonarioCollection;

class GenTalonarioController extends Controller
{
    public function index(Request $request) {

        $res = GenTalonario::orderBy('descripcion', 'ASC')->get();
        return new GenTalonarioCollection($res);

    }
  
    public function show(Request $request, GenTalonario $talonario)
    {
        return new GenTalonarioResource($talonario);
    }
  
    public function store(GenTalonarioStoreRequest $request) {

        $res = GenTalonario::create($request->all());
        //return new GenTalonarioResource($res);
    }
  
    public function update(GenTalonarioUpdateRequest $request, GenTalonario $talonario) {
        $talonario->update($request->all());
        //return new GenTalonarioResource($GenTalonario);
    }
  
    public function destroy(Request $request, GenTalonario $talonario)
    {
        $talonario->delete();
        return SuccessResponse::getSuccessResponse(200, 'Talonario deleted', 'The Talonario was successfully deleted');
    }
  
}
