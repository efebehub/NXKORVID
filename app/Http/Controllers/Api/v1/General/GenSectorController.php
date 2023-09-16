<?php

namespace App\Http\Controllers\Api\v1\General;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenSector;
use App\Http\Requests\Api\v1\General\GenSectorStoreRequest;
use App\Http\Requests\Api\v1\General\GenSectorUpdateRequest;
use App\Http\Resources\Api\v1\General\GenSectorResource;
use App\Http\Resources\Api\v1\General\GenSectorCollection;


class GenSectorController extends Controller
{
    public function index(Request $request) {

        $res = GenSector::orderBy('descripcion', 'ASC')->get();
        return new GenSectorCollection($res);

    }
  
    public function show(Request $request, GenSector $sectore)
    {
        return new GenSectorResource($sectore);
    }
  
    public function store(GenSectorStoreRequest $request) {

        $res = GenSector::create($request->all());
        //return new GenSectorResource($res);
    }
  
    public function update(GenSectorUpdateRequest $request, GenSector $sectore) {
        $sectore->update($request->all());
        //return new GenSectorResource($GenSector);
    }
  
    public function destroy(Request $request, GenSector $sectore)
    {
        $sectore->delete();
        return SuccessResponse::getSuccessResponse(200, 'Sector deleted', 'The Sector was successfully deleted');
    }
  
}
