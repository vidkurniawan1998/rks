<?php

namespace App\Exports;

use App\Logpurchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class logTransaksiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $logTransaksiExport = Logpurchase::select('log_purchase.tanggal', 'log_purchase.h2h_id', 'limit_koperasi.nama', 'log_purchase.vtype', 'log_purchase.tujuan', 'log_purchase.harga', 'log_purchase.vsn', 'log_purchase.status')
        ->join('limit_koperasi', 'log_purchase.h2h_id', '=', 'limit_koperasi.idstaff')
        ->where('agenid', 'LIKE', 'RK%')
        ->orderBy('log_purchase.tanggal', 'desc')
        ->get();

        foreach($logTransaksiExport as $li){
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
        return $logTransaksiExport;
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
