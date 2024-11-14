<?php

namespace App\Imports;

use App\Models\Kas;
use Maatwebsite\Excel\Concerns\ToModel;

class KasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kas([
            //
        ]);
    }
}
