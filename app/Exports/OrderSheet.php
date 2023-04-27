<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderSheet implements FromView
{
    protected $allOrders;

    function __construct($allOrders) {
        $this->allOrders = $allOrders;
    }

    public function view(): View {
        
        $allOrders  = $this->allOrders;
        return view('report.order_sheet_export',compact('allOrders'));
    }
}
