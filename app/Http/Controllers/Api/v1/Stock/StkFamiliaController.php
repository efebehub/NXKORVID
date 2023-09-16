<?php

namespace App\Http\Controllers\Api\v1\Stock;

use App\Models\Api\v1\Stock\StkFamilia;
use App\Http\Requests\Api\v1\Stock\StkFamiliaStoreRequest;
use App\Http\Requests\Api\v1\Stock\StkFamiliaUpdateRequest;
use App\Http\Resources\Api\v1\Stock\StkFamiliaCollection;
use App\Http\Resources\Api\v1\Stock\StkFamiliaResource;
use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StkFamiliaController extends Controller
{
    public function index(Request $request) {
        $res = StkFamilia::all();
        return new StkFamiliaCollection($res);
    }
  
      public function show(Request $request, StkFamilia $Familia)
      {
          return new StkFamiliaResource($Familia);
      }
  
    public function store(StkFamiliaStoreRequest $request) {

        //dd($request->all());

        $res = StkFamilia::create($request->all());
        //return new StkFamiliaResource($res);
    }
  
    public function update(StkFamiliaUpdateRequest $request, StkFamilia $Familia) {
        $Familia->update($request->all());
        //return new StkFamiliaResource($StkFamilia);
    }
  
    public function destroy(Request $request, StkFamilia $Familia)
    {
        $Familia->delete();
        return SuccessResponse::getSuccessResponse(200, 'Familia deleted', 'The Familia was successfully deleted');
    }
  
}
