<?php

namespace App\Http\Controllers\Api\v1\Production\Origin;

use App\Exports\Api\Production\Origin\OriginExport;
use App\Http\Responses\Api\v1\FileResponse;
use App\Models\Api\v1\Production\Origin\Origin;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Responses\Api\v1\SuccessResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Production\Origin\OriginStoreRequest;
use App\Http\Requests\Api\v1\Production\Origin\OriginUpdateRequest;
use App\Http\Resources\Api\v1\Production\Origin\OriginResource;
use App\Http\Resources\Api\v1\Production\Origin\OriginCollection;
use Illuminate\Support\Str;

class OriginController extends Controller
{
  public function index(Request $request) {
      $origin = Origin::all();
      return new OriginCollection($origin);
  }

    public function show(Request $request, Origin $origin)
    {
        return new OriginResource($origin);
    }

  public function store(OriginStoreRequest $request) {
      $origin = Origin::create($request->validated());
      return new OriginResource($origin);
  }

  public function update(OriginUpdateRequest $request, Origin $origin) {
      $origin->update($request->validated());
      return new OriginResource($origin);
  }

  public function destroy(Request $request, Origin $origin)
  {
      $origin->delete();
      return SuccessResponse::getSuccessResponse(200, 'Origin deleted', 'The Origin was successfully deleted');
  }

    public function exportExcel(Request $request){
        $excel = Excel::raw(new OriginExport(), \Maatwebsite\Excel\Excel::XLSX);
        $excelFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'type_cut' . DIRECTORY_SEPARATOR . 'types_cut.xlsx';
        $outputfile = './' . $excelFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $excelFile = Str::replace(DIRECTORY_SEPARATOR, '/', $excelFile);
        return FileResponse::getFileResponse(200, 'Types Cut exported to excel', $excelFile);
    }

    public function exportPdf(Request $request){
        $excel = Excel::raw(new OriginExport(), \Maatwebsite\Excel\Excel::MPDF);
        $pdfFile = 'data'. DIRECTORY_SEPARATOR . 'production'. DIRECTORY_SEPARATOR . 'type_cut' . DIRECTORY_SEPARATOR . 'origin.pdf';
        $outputfile = './' . $pdfFile;
        $filehandler = fopen($outputfile, 'wb');
        fwrite($filehandler, $excel);
        fclose($filehandler);
        $pdfFile = Str::replace(DIRECTORY_SEPARATOR, '/', $pdfFile);
        return FileResponse::getFileResponse(200, 'Types Cut exported to pdf', $pdfFile);
    }
}
