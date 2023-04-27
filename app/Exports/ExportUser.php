<?php

namespace App\Exports;

use App\Models\Enquiry;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Enquiry::select('qrn','so no','customer_name','city','region','enq_date','qte_date','engineer','description','price','status','contact_person','email','phone')->get();
    }
}
