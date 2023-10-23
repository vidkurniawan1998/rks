<?php

namespace App\Imports;

use App\Datalimit;
use Maatwebsite\Excel\Concerns\ToModel;

class DatalimitImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Datalimit([
            //
            'nama' => $row[1],
            'idstaff' => $row[2],
            'saldo' => $row[3],
        ]);
    }
}
