<?php

namespace App\Http\Controllers\Api\v1\Production\TypeCut;

use App\Exports\Api\Production\TypeCut\TypeCutExport;
use App\Http\Responses\Api\v1\FileResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Api\v1\Production\TypeCut\TypeCut;
use App\Http\Requests\Api\v1\Production\TypeCut\TypeCutStoreRequest;
use App\Http\Requests\Api\v1\Production\TypeCut\TypeCutUpdateRequest;
use App\Http\Resources\Api\v1\Production\TypeCut\TypeCutResource;
use App\Http\Resources\Api\v1\Production\TypeCut\TypeCutCollection;
use Illuminate\Support\Str;

class TypeCutController extends Controller
{
  public function index(Request $request) {
      $TypeCuts = TypeCut::all();
      return new TypeCutCollection($TypeCuts);
  }

    public function show(Request $request, TypeCut $TypeCut)
    {
        return new TypeCutResource($TypeCut);
    }

  public function store(TypeCutStoreRequest $request) {
      $TypeCut = TypeCut::create($request->validated());
      return new TypeCutResource($TypeCut);
  }

  public function update(TypeCutUpdateRequest $request, TypeCut $TypeCut) {
      $TypeCut->update($request->validated());
      return new TypeCutResource($TypeCut);
  }

  public function destroy(Request $request, TypeCut $TypeCut)
  {
      $TypeCut->delete();
      return SuccessResponse::getSuccessResponse(200, 'Measure Unit deleted', 'The Measure Unit was successfully deleted');
  }

    public function exportExcel(Request $request){
        $excel = Excel::raw(new TypeCutExport(), \Maatwebsite\Excel\Excel::XLSX);
        $excelFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'type_cut' . DIRECTORY_SEPARATOR . 'types_cut.xlsx';
        $outputfile = './' . $excelFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $excelFile = Str::replace(DIRECTORY_SEPARATOR, '/', $excelFile);
        return FileResponse::getFileResponse(200, 'Types Cut exported to excel', $excelFile);
    }

    public function exportPdf(Request $request){
        $excel = Excel::raw(new TypeCutExport(), \Maatwebsite\Excel\Excel::MPDF);
        $pdfFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'type_cut' . DIRECTORY_SEPARATOR . 'types_cut.pdf';
        $outputfile = './' . $pdfFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $pdfFile = Str::replace(DIRECTORY_SEPARATOR, '/', $pdfFile);
        return FileResponse::getFileResponse(200, 'Types Cut exported to pdf', $pdfFile);
    }
}
