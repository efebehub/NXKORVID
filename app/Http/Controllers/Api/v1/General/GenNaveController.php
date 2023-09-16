<?php

namespace App\Http\Controllers\Api\v1\General;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\General\GenNave;
use App\Http\Requests\Api\v1\General\GenNaveStoreRequest;
use App\Http\Requests\Api\v1\General\GenNaveUpdateRequest;
use App\Http\Resources\Api\v1\General\GenNaveResource;
use App\Http\Resources\Api\v1\General\GenNaveCollection;


class GenNaveController extends Controller
{
    public function index(Request $request) {
        $res = GenNave::all();
        return new GenNaveCollection($res);
    }
  
      public function show(Request $request, GenNave $nafe)
      {
          return new GenNaveResource($nafe);
      }
  
    public function store(GenNaveStoreRequest $request) {
        $res = GenNave::create($request->all());
        //return new GenNaveResource($res);
    }
  
    public function update(GenNaveUpdateRequest $request, GenNave $nafe) {
        $nafe->update($request->all());
        //return new GenNaveResource($GenNave);
    }
  
    public function destroy(Request $request, GenNave $nafe)
    {
        $nafe->delete();
        return SuccessResponse::getSuccessResponse(200, 'Nave deleted', 'The Nave was successfully deleted');
    }
  
}
