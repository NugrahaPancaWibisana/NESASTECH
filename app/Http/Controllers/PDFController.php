<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Keuangan;
use Carbon\Carbon;

class PDFController extends Controller
{
    public function generatePDF()
    {

        $data = Keuangan::orderBy('id', 'desc')->get();
        $today = Carbon::today()->toDateString();
        $dataHariIni = Keuangan::whereDate('tanggal', $today)->get();

        $totalMasuk = $dataHariIni->sum('masuk');
        $totalKeluar = $dataHariIni->sum('keluar');
        $selisih = $data->sum('masuk') - $data->sum('keluar');

        // return view('pdf', compact('data', 'totalMasuk', 'totalKeluar', 'selisih', 'today'));
        $pdf = Pdf::loadView('pdf', compact('data', 'totalMasuk', 'totalKeluar', 'selisih', 'today'));
        return $pdf->download('PENGHASILAN_NESASTECH_' . today() . '.pdf');
    }
}
