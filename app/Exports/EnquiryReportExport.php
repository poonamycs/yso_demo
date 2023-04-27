<?php

namespace App\Exports;

use App\Models\Enquiry;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EnquiryReportExport implements FromView
{
    protected $hot,$warm,$longlead,$from,$to;

    function __construct($hot,$warm,$longlead,$from,$to) {
        $this->hot = $hot;
        $this->warm = $warm;
        $this->longlead = $longlead;
        $this->from = $from;
        $this->to = $to;
    }

    public function view(): View {
        $hot = $this->hot;
        $warm = $this->warm;
        $longlead = $this->longlead;
        $from = $this->from;
        $to = $this->to;
        return view('report.enquiry_report_export',compact('hot','warm','longlead','from','to'));
    }
}
