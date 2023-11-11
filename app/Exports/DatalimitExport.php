<?php

namespace App\Exports;

use App\Datalimit;
use Maatwebsite\Excel\Concerns\FromCollection;

class DatalimitExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return Datalimit::select('idstaff', 'nama', 'saldo', 'created_at')->get();
    }
}
