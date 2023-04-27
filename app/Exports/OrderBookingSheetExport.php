<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderBookingSheetExport implements FromView
{
    protected $year,$q1,$q2,$q3,$q4;

    function __construct($year, $q1, $q2, $q3, $q4) {
        $this->year = $year;
        $this->q1 = $q1;
        $this->q2 = $q2;
        $this->q3 = $q3;
        $this->q4 = $q4;
    }

    public function view(): View {
        $year = $this->year;
        $q1 = $this->q1;
        $q2 = $this->q2;
        $q3 = $this->q3;
        $q4 = $this->q4;
        return view('report.order_booking_sheet_export',compact('year','q1','q2','q3','q4'));
    }
}
