<?php

namespace App\Http\Controllers\Api\v1\Production\Family;

use App\Exports\Api\Production\Family\FamiliesExport;
use App\Http\Responses\Api\v1\FileResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\Production\Family\Family;
use App\Http\Requests\Api\v1\Production\Family\FamilyStoreRequest;
use App\Http\Requests\Api\v1\Production\Family\FamilyUpdateRequest;
use App\Http\Resources\Api\v1\Production\Family\FamilyResource;
use App\Http\Resources\Api\v1\Production\Family\FamilyCollection;
use Illuminate\Support\Str;

class FamilyController extends Controller
{
  public function index(Request $request) {
      $categories = Family::all();
      return new FamilyCollection($categories);
  }

    public function show(Request $request, Family $Family)
    {
        return new FamilyResource($Family);
    }

  public function store(FamilyStoreRequest $request) {
      $Family = Family::create($request->validated());
      return new FamilyResource($Family);
  }

  public function update(FamilyUpdateRequest $request, Family $Family) {
      $Family->update($request->validated());
      return new FamilyResource($Family);
  }

  public function destroy(Request $request, Family $Family)
  {
      $Family->delete();
      return SuccessResponse::getSuccessResponse(200, 'Family deleted', 'The family was successfully deleted');
  }

    public function exportExcel(Request $request){
        $excel = Excel::raw(new FamiliesExport(), \Maatwebsite\Excel\Excel::XLSX);
        $excelFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'family' . DIRECTORY_SEPARATOR . 'families.xlsx';
        $outputfile = './' . $excelFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $excelFile = Str::replace(DIRECTORY_SEPARATOR, '/', $excelFile);
        return FileResponse::getFileResponse(200, 'Families exported to excel', $excelFile);
    }

    public function exportPdf(Request $request){
        $excel = Excel::raw(new FamiliesExport(), \Maatwebsite\Excel\Excel::MPDF);
        $pdfFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'family' . DIRECTORY_SEPARATOR . 'families.pdf';
        $outputfile = './' . $pdfFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $pdfFile = Str::replace(DIRECTORY_SEPARATOR, '/', $pdfFile);
        return FileResponse::getFileResponse(200, 'Families exported to pdf', $pdfFile);
    }
}
