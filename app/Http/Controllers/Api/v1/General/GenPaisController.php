<?php

namespace App\Http\Controllers\Api\v1\General;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenPais;
use App\Http\Requests\Api\v1\General\GenPaisStoreRequest;
use App\Http\Requests\Api\v1\General\GenPaisUpdateRequest;
use App\Http\Resources\Api\v1\General\GenPaisResource;
use App\Http\Resources\Api\v1\General\GenPaisCollection;


class GenPaisController extends Controller
{
    public function index(Request $request) {
        $res = GenPais::all();
        return new GenPaisCollection($res);
    }
  
      public function show(Request $request, GenPais $paise)
      {
          return new GenPaisResource($paise);
      }
  
    public function store(GenPaisStoreRequest $request) {
        $res = GenPais::create($request->all());
        //return new GenPaisResource($res);
    }
  
    public function update(GenPaisUpdateRequest $request, GenPais $paise) {
        $paise->update($request->all());
        //return new GenPaisResource($GenPais);
    }
  
    public function destroy(Request $request, GenPais $paise)
    {
        $paise->delete();
        return SuccessResponse::getSuccessResponse(200, 'Pais deleted', 'The Pais was successfully deleted');
    }
  
}
