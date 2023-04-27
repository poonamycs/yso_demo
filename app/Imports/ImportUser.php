<?php

namespace App\Imports;

use App\Models\Enquiry;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Enquiry([
            'qrn' => $row[0],
            'so no' => $row[1],
            'customer_name' => $row[2],
            'city' => $row[3],
            'region' => $row[4],
            'enq_date' => $row[5],
            'qte_date' => $row[6],
            'engineer' => $row[7],
            'description' => $row[8],
            'price' => $row[9],
            'status' => $row[10],
            'contact_person' => $row[11],
            'email' => $row[12],
            'phone' => $row[13],
        ]);
    }
}
