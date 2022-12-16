<?php

namespace App\Http\Controllers;

use app\models\karyawan_sp;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $karyawan_sp = karyawan_sp::all();
        return view('laporan/karyawan_sp',['karyawan_sp'=>$karyawan_sp]);
    
    }

    public static function cetak_pdf($id)
    {
        $karyawan_sp = karyawan_sp::where('id',$id);

        $pdf = PDF::loadview('laporan/karyawan_spPdf',['karyawan_sp'=>$karyawan_sp]);
        return $pdf->download('laporan-karyawanSP');
    }
}
