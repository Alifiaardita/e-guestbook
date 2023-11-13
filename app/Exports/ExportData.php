<?php

namespace App\Exports;

use App\Http\Controllers\RekapController;
use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportData implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
      $rekap = Tamu::all();

        return view('table',compact('rekap'));
    }
}
