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
            'idstaff' => $row[1],
            'nama' => $row[2],
            'saldo' => $row[3],
        ]);
    }
}
