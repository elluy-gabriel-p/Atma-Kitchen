<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Karyawan;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;



class PresensiKaryawanController extends Controller
{
    public function index()
    {
        $presensi = Presensi::join('karyawan', 'karyawan.id_karyawan', '=', 'presensi.id_karyawan')
            ->get();
        
        return view('mo.laporanPresensiDanGaji.index', compact('presensi'));
    }

}
