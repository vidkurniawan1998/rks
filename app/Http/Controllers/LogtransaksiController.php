<?php

namespace App\Http\Controllers;
use App\Logpurchase;
use App\Exports\logTransaksiExport;
use Maatwebsite\Excel\Facades\Excel;

use Session;

use Illuminate\Http\Request;

class LogtransaksiController extends Controller
{
    //Untuk Menampilkan Log Transaksi
    public function view_log_transaksi()
    {
        $query= Logpurchase::select('log_purchase.*', 'log_purchase.status as status', 'limit_koperasi.nama as nama')
        ->join('limit_koperasi', 'log_purchase.h2h_id', '=', 'limit_koperasi.idstaff')
        ->where('agenid', 'LIKE', 'RK%');

        // if (!empty($agenid)) {
        //     $query->where(function($q) use ($agenid) {
        //         $q->where('agenid', 'LIKE', 'RK%'); // Mencari agen yang dimulai dengan 'CW'
        //     });
        // }

        if (!empty($start_date)) {
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        }

        $query->orderBy('tanggal', 'desc');
        $logpurchase = $query->paginate(10);
        return view('pages.logtransaksi', compact('logpurchase'));
    }

    public function download_log_transaksi(){
        return Excel::download(new logTransaksiExport, 'log_transaksi.xlsx');
    }

    public function filter_log_transaksi(Request $request)
    {
        //Untuk Melakukan Filter Log Transaksi
        $agenid = $request->input('agenid');
        $start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));

        $query= Logpurchase::query();

        if (!empty($agenid)) {
            $query->where(function($q) use ($agenid) {
                $q->where('agenid', 'LIKE', 'RK%')// Mencari agen yang dimulai dengan 'CW'
                ->orwhere('h2h_id', '');//Mencari Dengan h2h_id Seluruhnya
            });
        }

        if (!empty($start_date)) {
            $start_date = date('Y-m-d H:i:s', strtotime($start_date.' 00:00:00'));
            $end_date = date('Y-m-d H:i:s', strtotime($end_date.' 23:59:59'));
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        }

        $logpurchase = $query->paginate(10);
        return view('pages.logtransaksi', compact('logpurchase'));
    }
}
