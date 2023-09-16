<?php

namespace App\Http\Controllers\Api\v1\Production\MeasureUnit;

use App\Exports\Api\Production\MeasureUnit\MeasureUnitExport;
use App\Http\Responses\Api\v1\FileResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\Production\MeasureUnit\MeasureUnit;
use App\Http\Requests\Api\v1\Production\MeasureUnit\MeasureUnitStoreRequest;
use App\Http\Requests\Api\v1\Production\MeasureUnit\MeasureUnitUpdateRequest;
use App\Http\Resources\Api\v1\Production\MeasureUnit\MeasureUnitResource;
use App\Http\Resources\Api\v1\Production\MeasureUnit\MeasureUnitCollection;
use Illuminate\Support\Str;

class MeasureUnitController extends Controller
{
  public function index(Request $request) {
      $measureUnits = MeasureUnit::all();
      return new MeasureUnitCollection($measureUnits);
  }

    public function show(Request $request, MeasureUnit $measureUnit)
    {
        return new MeasureUnitResource($measureUnit);
    }

  public function store(MeasureUnitStoreRequest $request) {
      $measureUnit = MeasureUnit::create($request->validated());
      return new MeasureUnitResource($measureUnit);
  }

  public function update(MeasureUnitUpdateRequest $request, MeasureUnit $measureUnit) {
      $measureUnit->update($request->validated());
      return new MeasureUnitResource($measureUnit);
  }

  public function destroy(Request $request, MeasureUnit $measureUnit)
  {
      $measureUnit->delete();
      return SuccessResponse::getSuccessResponse(200, 'Type Cut deleted', 'The Type Cut was successfully deleted');
  }

    public function exportExcel(Request $request){
        $excel = Excel::raw(new MeasureUnitExport(), \Maatwebsite\Excel\Excel::XLSX);
        $excelFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'measure_unit' . DIRECTORY_SEPARATOR . 'measure_units.xlsx';
        $outputfile = './' . $excelFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $excelFile = Str::replace(DIRECTORY_SEPARATOR, '/', $excelFile);
        return FileResponse::getFileResponse(200, 'Measurement Units exported to excel', $excelFile);
    }

    public function exportPdf(Request $request){
        $excel = Excel::raw(new MeasureUnitExport(), \Maatwebsite\Excel\Excel::MPDF);
        $pdfFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'measure_unit' . DIRECTORY_SEPARATOR . 'measure_units.pdf';
        $outputfile = './' . $pdfFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $pdfFile = Str::replace(DIRECTORY_SEPARATOR, '/', $pdfFile);
        return FileResponse::getFileResponse(200, 'Measurement Units exported to pdf', $pdfFile);
    }
}
