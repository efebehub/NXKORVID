<?php

namespace App\Http\Controllers\Api\v1\Production\Product;

use App\Exports\Api\Production\Product\ProductExport;
use App\Http\Responses\Api\v1\FileResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\Production\Product\Product;
use App\Http\Requests\Api\v1\Production\Product\ProductStoreRequest;
use App\Http\Requests\Api\v1\Production\Product\ProductUpdateRequest;
use App\Http\Resources\Api\v1\Production\Product\ProductResource;
use App\Http\Resources\Api\v1\Production\Product\ProductCollection;
use Illuminate\Support\Str;

class ProductController extends Controller
{
  public function index(Request $request) {
      $Products = Product::all();
      return new ProductCollection($Products);
  }

    public function show(Request $request, Product $Product)
    {
        return new ProductResource($Product);
    }

  public function store(ProductStoreRequest $request) {
      $Product = Product::create($request->validated());
      return new ProductResource($Product);
  }

  public function update(ProductUpdateRequest $request, Product $Product) {
      $Product->update($request->validated());
      return new ProductResource($Product);
  }

  public function destroy(Request $request, Product $Product)
  {
      $Product->delete();
      return SuccessResponse::getSuccessResponse(200, 'Measure Unit deleted', 'The Measure Unit was successfully deleted');
  }

    public function exportExcel(Request $request){
        $excel = Excel::raw(new ProductExport(), \Maatwebsite\Excel\Excel::XLSX);
        $excelFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'type_cut' . DIRECTORY_SEPARATOR . 'types_cut.xlsx';
        $outputfile = './' . $excelFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $excelFile = Str::replace(DIRECTORY_SEPARATOR, '/', $excelFile);
        return FileResponse::getFileResponse(200, 'Types Cut exported to excel', $excelFile);
    }

    public function exportPdf(Request $request){
        $excel = Excel::raw(new ProductExport(), \Maatwebsite\Excel\Excel::MPDF);
        $pdfFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'type_cut' . DIRECTORY_SEPARATOR . 'types_cut.pdf';
        $outputfile = './' . $pdfFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $pdfFile = Str::replace(DIRECTORY_SEPARATOR, '/', $pdfFile);
        return FileResponse::getFileResponse(200, 'Types Cut exported to pdf', $pdfFile);
    }
}
