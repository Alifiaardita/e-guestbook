<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        $data = Tamu::all();

        $count_today = Tamu::whereDate('created_at', date("Y-m-d"))->count();
        $count_yesterday = Tamu::whereDate('created_at', date("Y-m-d h:i:s", strtotime("-1 days")))->count();
        $countDays = 0;
        $count_weeks = Tamu::whereBetween('created_at', [date("Y-m-d h:i:s", strtotime("-6 days")), date("Y-m-d h:i:s")])->count();
        $count_months = Tamu::whereBetween('created_at', [date("Y-m-d h:i:s", strtotime("-1 months")), date("Y-m-d h:i:s")])->count();
        $count_all = Tamu::whereBetween('created_at', [date("Y-m-d h:i:s", strtotime("all")), date("Y-m-d h:i:s")])->count();


        // dd($count_weeks);

        return view('admin', compact('data', 'count_today','count_yesterday','count_weeks', 'count_months', 'count_all'));

    }


    public function store(Request $request){
        // dd($request);

        //custom message
        $message =
        [
        'requred' => ':attribute harus diisi dong',
        'min' => ':attribute minimal :min karakter',
        'max' => ':attribute maximal :max karakter'

        ];

        //validasi
        $this->validate($request,[

            // 'tanggal'=>'required',
            'nama'=>'required|min:3|max:50',
            'alamat'=>'required',
            'tujuan'=>'required',
            'nope'=>'required|min:12|max:13',


        ], $message);

        // dd($request->all());
        if($request->tanggal != null){
            // dd($request->tanggal);
            $tanggal = $request->tanggal;
        }else{
            $tanggal = date("Y-m-d");
        }
        Tamu::create([
            'tanggal' => $tanggal,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tujuan' => $request->tujuan,
            'nope' => $request->nope


        ]);


        return redirect()->route('admin')->with('message', 'Data siswa berhasil ditambahkan');

    }


}


