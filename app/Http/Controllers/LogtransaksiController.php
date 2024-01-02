<?php

namespace App\Http\Controllers;
use App\Logpurchase;
use App\Exports\logTransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Exportable;

use Session;

use Illuminate\Http\Request;

class LogtransaksiController extends Controller
{
    use Exportable;
    //Untuk Menampilkan Log Transaksi
    public function view_log_transaksi(Request $request)
    {
        $query= Logpurchase::select('log_purchase.*', 'log_purchase.status as status', 'limit_koperasi.nama as nama')
        ->join('limit_koperasi', 'log_purchase.h2h_id', '=', 'limit_koperasi.idstaff')
        ->where('agenid', 'LIKE', 'RK%');

        // if (!empty($agenid)) {
        //     $logpurchase->where(function ($q) use ($agenid) {
        //         $q->where('agenid', 'LIKE', $agenid) // Mencari agen yang dimulai dengan 'CW'
        //             ->orWhere('h2h_id', 'LIKE', $agenid); // Mencari Dengan h2h_id Seluruhnya
        //     });
        // }

        $query->orderBy('tanggal', 'desc');
        $logpurchase = $query->paginate(10);

        return view('pages.logtransaksi', compact('logpurchase'));
    }

    public function download_log_transaksi(Request $request)
    {
        // // Call the filter_log_transaksi method to get the filtered data
        // $logpurchaseData = $this->filter_log_transaksi($request);

        // // Create an instance of logTransaksiExport with the filtered data
        // $export = new logTransaksiExport($request);

        // // Download the exported data as an Excel file
        // return Excel::download($export, 'log_transaksi.xlsx');
        // return Excel::download(new logTransaksiExport, 'log_transaksi.xlsx');

        // Call the filter_log_transaksi method to get the filtered data
        $logpurchaseData = $this->filter_log_transaksi($request);

        // Check if filters are present
        $filtersPresent = $request->filled('agenid') || $request->filled('start_date') || $request->filled('end_date');

        // Create an instance of logTransaksiExport with the appropriate data
        $export = new logTransaksiExport($request);

        if ($filtersPresent) {
            // Download the filtered data as an Excel file using FilterExport
            return Excel::download(new FilterExport($logpurchaseData), 'log_transaksi_filtered.xlsx');
        } else {
            // Download all data as an Excel file using logTransaksiExport
            return Excel::download(new logTransaksiExport($request), 'log_transaksi_all.xlsx');
        }
    }

    public function filter_log_transaksi(Request $request)
    {
        //Untuk Melakukan Filter Log Transaksi
        $agenid = $request->input('agenid');
        $start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));

        $query= Logpurchase::select('log_purchase.*', 'log_purchase.status as status', 'limit_koperasi.nama as nama')
        ->join('limit_koperasi', 'log_purchase.h2h_id', '=', 'limit_koperasi.idstaff');

        if (!empty($agenid)) {
            $query->where(function ($q) use ($agenid) {
                $q->where('agenid', 'LIKE', $agenid) // Mencari agen yang dimulai dengan 'CW'
                    ->orWhere('h2h_id', 'LIKE', $agenid); // Mencari Dengan h2h_id Seluruhnya
            });
        }

        if (!empty($start_date)) {
            $start_date = date('Y-m-d H:i:s', strtotime($start_date.' 00:00:00'));
            $end_date = date('Y-m-d H:i:s', strtotime($end_date.' 23:59:59'));
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        }

        $logpurchase = $query->paginate(10); // Get the data without pagination

        $logpurchase = $query->orderBy('tanggal', 'desc')->get();
        $data = [
            'logpurchase' => $logpurchase,
            'agenid' => $agenid,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];

        return view('pages.logtransaksi', compact('logpurchase', 'agenid', 'start_date', 'end_date', 'data'));
    }
}
