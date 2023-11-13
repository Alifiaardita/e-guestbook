<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RekapController extends Controller
{
    public function index(Request $request){
        // dd($request);
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $rekap = Tamu::whereBetween('tanggal',[$startDate, $endDate])->get();

        return view('rekapitulasi',compact('rekap'));
    }
    public function cetak(){
        //dd($tglawal , $tglakhir);
      return Excel::download(new ExportData, "rekapitulasi.xlsx");
    }
}
