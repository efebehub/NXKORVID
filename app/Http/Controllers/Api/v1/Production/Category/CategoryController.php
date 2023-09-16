<?php

namespace App\Http\Controllers\Api\v1\Production\Category;

use App\Exports\Api\Production\Category\CategoriesExport;
use App\Http\Responses\Api\v1\FileResponse;
use App\Http\Responses\Api\v1\SuccessResponse;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\Production\Category\Category;
use App\Http\Requests\Api\v1\Production\Category\CategoryStoreRequest;
use App\Http\Requests\Api\v1\Production\Category\CategoryUpdateRequest;
use App\Http\Resources\Api\v1\Production\Category\CategoryResource;
use App\Http\Resources\Api\v1\Production\Category\CategoryCollection;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  public function index(Request $request) {
      $categories = Category::all();
      return new CategoryCollection($categories);
  }

    public function show(Request $request, Category $category)
    {
        return new CategoryResource($category);
    }

  public function store(CategoryStoreRequest $request) {
      $category = Category::create($request->validated());
      return new CategoryResource($category);
  }

  public function update(CategoryUpdateRequest $request, Category $category) {
      $category->update($request->validated());
      return new CategoryResource($category);
  }

  public function destroy(Request $request, Category $category)
  {
      $category->delete();
      return SuccessResponse::getSuccessResponse(200, 'Category deleted', 'The category was successfully deleted');
  }

  public function exportExcel(Request $request){
      $excel = Excel::raw(new CategoriesExport(), \Maatwebsite\Excel\Excel::XLSX);
      $excelFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'categories.xlsx';
      $outputfile = './' . $excelFile;
      $filehandler = fopen($outputfile, 'wb');
      fwrite($filehandler, $excel);
      fclose($filehandler);
      $excelFile = Str::replace(DIRECTORY_SEPARATOR, '/', $excelFile);
      return FileResponse::getFileResponse(200, 'Categories exported to excel', $excelFile);
  }

    public function exportPdf(Request $request){
        $excel = Excel::raw(new CategoriesExport(), \Maatwebsite\Excel\Excel::MPDF);
        $pdfFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'categories.pdf';
        $outputfile = './' . $pdfFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $pdfFile = Str::replace(DIRECTORY_SEPARATOR, '/', $pdfFile);
        return FileResponse::getFileResponse(200, 'Categories exported to pdf', $pdfFile);
    }
}
