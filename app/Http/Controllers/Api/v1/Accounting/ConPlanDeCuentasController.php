<?php

namespace App\Http\Controllers\Api\v1\Accounting;

use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\Accounting\ConPlanDeCuentas;
use App\Http\Requests\Api\v1\Accounting\ConPlanDeCuentasStoreRequest;
use App\Http\Requests\Api\v1\Accounting\ConPlanDeCuentasUpdateRequest;
use App\Http\Resources\Api\v1\Accounting\ConPlanDeCuentasResource;
use App\Http\Resources\Api\v1\Accounting\ConPlanDeCuentasCollection;

class ConPlanDeCuentasController extends Controller
{
    public function index(Request $request) {
        $res = ConPlanDeCuentas::all();
        return new ConPlanDeCuentasCollection($res);
    }
  
      public function show(Request $request, ConPlanDeCuentas $plandecuenta)
      {
          return new ConPlanDeCuentasResource($plandecuenta);
      }
  
    public function store(ConPlanDeCuentasStoreRequest $request) {

        //dd($request->all());

        $res = ConPlanDeCuentas::create($request->all());
        //return new ConPlanDeCuentasResource($res);
    }
  
    public function update(ConPlanDeCuentasUpdateRequest $request, ConPlanDeCuentas $plandecuenta) {
        $plandecuenta->update($request->all());
        //return new ConPlanDeCuentasResource($ConPlanDeCuentas);
    }
  
    public function destroy(Request $request, ConPlanDeCuentas $plandecuenta)
    {
        $plandecuenta->delete();
        return SuccessResponse::getSuccessResponse(200, 'Cuenta deleted', 'The Cuenta was successfully deleted');
    }
  
}
