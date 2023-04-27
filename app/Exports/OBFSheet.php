<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OBFSheet implements FromView
{
    protected $fy,$target,$targets,$setargets,$q1,$q2,$q3,$q4,$poAwaited;

    function __construct($fy,$target,$targets,$setargets,$q1,$q2,$q3,$q4,$saleq1,$saleq2,$saleq3,$saleq4,$poAwaited) {
        $this->fy       = $fy;
        $this->target   = $target;
        $this->targets  = $targets;
        $this->setargets = $setargets;
        $this->q1       = $q1;
        $this->q2       = $q2;
        $this->q3       = $q3;
        $this->q4       = $q4;
        $this->saleq1   = $saleq1;
        $this->saleq2   = $saleq2;
        $this->saleq3   = $saleq3;
        $this->saleq4   = $saleq4;
        $this->poAwaited = $poAwaited;
    }

    public function view(): View {
        $fy         = $this->fy;
        $target     = $this->target;
        $targets    = $this->targets;
        $setargets  = $this->setargets;
        $q1         = $this->q1;
        $q2         = $this->q2;
        $q3         = $this->q3;
        $q4         = $this->q4;
        $saleq1     = $this->saleq1;
        $saleq2     = $this->saleq2;
        $saleq3     = $this->saleq3;
        $saleq4     = $this->saleq4;
        $poAwaited  = $this->poAwaited;
        return view('report.obf_sheet_export',compact('fy','target','targets','setargets','q1','q2','q3','q4','saleq1','saleq2','saleq3','saleq4','poAwaited'));
    }
}
