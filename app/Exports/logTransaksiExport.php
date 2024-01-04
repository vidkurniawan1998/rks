<?php

namespace App\Exports;

use App\Logpurchase;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class logTransaksiExport implements FromCollection, WithHeadings
{
    protected $logPurchaseData;

    public function __construct($logPurchaseData)
    {
        $this->logPurchaseData = $logPurchaseData;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $now = Carbon::now();

        $logPurchaseCollection = Logpurchase::select('log_purchase.tanggal', 'log_purchase.h2h_id', 'limit_koperasi.nama', 'log_purchase.vtype', 'log_purchase.tujuan', 'log_purchase.harga', 'log_purchase.vsn', 'log_purchase.status')
        ->join('limit_koperasi', 'log_purchase.h2h_id', '=', 'limit_koperasi.idstaff')
        ->where('agenid', 'LIKE', 'RK%')
        ->whereMonth('log_purchase.tanggal', $now->month)
        ->whereYear('log_purchase.tanggal', $now->year)
        ->orderBy('log_purchase.tanggal', 'desc')
        ->get();

        foreach($logPurchaseCollection as $li){
            switch($li->status){
                case 0:
                    $li->status = 'Antri';
                    break;
                case 1:
                    $li->status = 'Sedang Diproses';
                    break;
                case 2 :
                    $li->status = 'Gagal';
                    break;
                case 3 :
                    $li->status = 'Refund';
                    break;
                case 4 :
                    $li->status = 'Sukses';
                    break;
                default:
                    $li->status = 'Error';
            }
        }
        return $logPurchaseCollection;
    }

    public function headings():array{
        return [
            'Tanggal',
            'ID Staff',
            'Nama',
            'Vtype',
            'Tujuan',
            'Harga',
            'Vsn',
            'Status',
        ];
    }
}
