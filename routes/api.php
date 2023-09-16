<?php

use App\Models\Api\v1\General\GenTalonario;
use App\Models\Api\v1\General\GenTipoComprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::apiResource('accounting/plandecuentas', App\Http\Controllers\Api\v1\Accounting\ConPlanDeCuentasController::class, ['as' => 'api.v1']);


Route::group(['middleware' => ['cors']], function () {
  Route::group(['middleware' => ['auth:sanctum']], function () {

      //******************************//
      //      Production Routes       //
      //******************************//
      /**** Category ****/
      Route::apiResource('production/category', App\Http\Controllers\Api\v1\Production\Category\CategoryController::class, ['as' => 'api.v1']);
      Route::get('production/category/export/excel',[App\Http\Controllers\Api\v1\Production\Category\CategoryController::class, 'exportExcel']);
      Route::get('production/category/export/pdf',[App\Http\Controllers\Api\v1\Production\Category\CategoryController::class, 'exportPdf']);

      /**** Family ****/
      Route::apiResource('production/family', App\Http\Controllers\Api\v1\Production\Family\FamilyController::class, ['as' => 'api.v1']);
      Route::get('production/family/export/excel',[App\Http\Controllers\Api\v1\Production\Family\FamilyController::class, 'exportExcel']);
      Route::get('production/family/export/pdf',[App\Http\Controllers\Api\v1\Production\Family\FamilyController::class, 'exportPdf']);

      /**** Measure Unit ****/
      Route::apiResource('production/measure_unit', App\Http\Controllers\Api\v1\Production\MeasureUnit\MeasureUnitController::class, ['as' => 'api.v1']);
      Route::get('production/measure_unit/export/excel',[App\Http\Controllers\Api\v1\Production\MeasureUnit\MeasureUnitController::class, 'exportExcel']);
      Route::get('production/measure_unit/export/pdf',[App\Http\Controllers\Api\v1\Production\MeasureUnit\MeasureUnitController::class, 'exportPdf']);

      /**** Type Cut ****/
      Route::apiResource('production/type_cut', App\Http\Controllers\Api\v1\Production\TypeCut\TypeCutController::class, ['as' => 'api.v1']);
      Route::get('production/type_cut/export/excel',[App\Http\Controllers\Api\v1\Production\TypeCut\TypeCutController::class, 'exportExcel']);
      Route::get('production/type_cut/export/pdf',[App\Http\Controllers\Api\v1\Production\TypeCut\TypeCutController::class, 'exportPdf']);

      /**** Origin ****/
      Route::apiResource('production/origin', App\Http\Controllers\Api\v1\Production\Origin\OriginController::class, ['as' => 'api.v1']);
      Route::get('production/origin/export/excel',[App\Http\Controllers\Api\v1\Production\Origin\OriginController::class, 'exportExcel']);
      Route::get('production/origin/export/pdf',[App\Http\Controllers\Api\v1\Production\Origin\OriginController::class, 'exportPdf']);

      /**** Product ****/
      Route::apiResource('production/product', App\Http\Controllers\Api\v1\Production\Product\ProductController::class, ['as' => 'api.v1']);
      Route::get('production/product/export/excel',[App\Http\Controllers\Api\v1\Production\Product\ProductController::class, 'exportExcel']);
      Route::get('production/product/export/pdf',[App\Http\Controllers\Api\v1\Production\Product\ProductController::class, 'exportPdf']);


      //******************************//
      //      General Routes       //
      //******************************//
      Route::group(['namespace' => 'App\Http\Controllers\Api\v1\General'], function() {
        Route::apiResource('general/paises', GenPaisController::class, ['as' => 'api.v1']);
        Route::apiResource('general/provincias', GenProvinciaController::class, ['as' => 'api.v1']);
        Route::apiResource('general/localidades', GenLocalidadController::class, ['as' => 'api.v1']);
        Route::apiResource('general/tiposiva', GenTipoIvaController::class, ['as' => 'api.v1']);
        Route::apiResource('general/talonarios', GenTalonarioController::class, ['as' => 'api.v1']);
        Route::apiResource('general/tiposcomprobante', GenTipoComprobanteController::class, ['as' => 'api.v1']);
        Route::apiResource('general/impuestos', GenImpuestoController::class, ['as' => 'api.v1']);
        Route::apiResource('general/marcas', GenMarcaController::class, ['as' => 'api.v1']);
        Route::apiResource('general/naves', GenNaveController::class, ['as' => 'api.v1']);
        Route::apiResource('general/sectores', GenSectorController::class, ['as' => 'api.v1']);
        Route::apiResource('general/entidades', GenEntidadController::class, ['as' => 'api.v1']);
      });

      //******************************//
      //      Accounting Routes       //
      //******************************//
      Route::group(['namespace' => 'App\Http\Controllers\Api\v1\Accounting'], function() {
        Route::apiResource('accounting/plandecuentas', ConPlanDeCuentasController::class, ['as' => 'api.v1']);
      });

      //******************************//
      //      Stock Routes       //
      //******************************//
      Route::group(['namespace' => 'App\Http\Controllers\Api\v1\Stock'], function() {
        Route::apiResource('stock/listadeprecios', StkListaPreciosController::class, ['as' => 'api.v1']);
        Route::apiResource('stock/lineas', StkLineaController::class, ['as' => 'api.v1']);
        Route::apiResource('stock/familias', StkFamiliaController::class, ['as' => 'api.v1']);
      });



      //******************************//
      //    Authentication Routes     //
      //******************************//
      Route::apiResource('role', App\Http\Controllers\Api\v1\Auth\UserController::class, ['as' => 'api.v1'])->only(['show']);
      Route::apiResource('user', App\Http\Controllers\Api\v1\Auth\UserController::class, ['as' => 'api.v1'])->only(['index', 'update']);

      //******************************//
      //     Personalized Routes      //
      //******************************//
      Route::get ('user/is-authenticated', [App\Http\Controllers\Api\v1\Auth\UserController::class, 'isAuthenticated']);
      Route::post('user/logout', [App\Http\Controllers\Api\v1\Auth\UserController::class, 'logout']);
  	  Route::get ('user/uuid/{uuid}', [App\Http\Controllers\Api\v1\Auth\UserController::class, 'showByUuid']);
      Route::post('user/upload-image/{uuid}', [App\Http\Controllers\Api\v1\Auth\UserController::class, 'uploadImage']);
  });

  //API route for user login
  Route::post('user/login', [App\Http\Controllers\Api\v1\Auth\UserController::class, 'login'])->name('api.v1.user.login');
  Route::post('user'      , [App\Http\Controllers\Api\v1\Auth\UserController::class, 'store']);

});
