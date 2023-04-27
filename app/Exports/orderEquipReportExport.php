<?php

namespace App\Exports;
use App\Models\Stage;
use App\Models\OrderStages;
use App\Models\OrderEquipments;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class orderEquipReportExport implements FromView
{	

    // public function collection(){
    //     return OrderEquipments::all();
    // }

	protected $order,$order_stages,$orderEquipment,$max_delivery_date,$stageday;

	function __construct($order, $order_stages, $orderEquipment, $max_delivery_date, $stageday) {
	    $this->order = $order;
	    $this->order_stages = $order_stages;
	    $this->orderEquipment = $orderEquipment;
		$this->max_delivery_date = $max_delivery_date;
		$this->stageday = $stageday;
	}

    public function view(): View {
    	$rows = OrderEquipments::where('order_id',$this->order->id)->get();
    	$order = $this->order;
    	$order_stages = $this->order_stages;
    	$orderEquipment = $this->orderEquipment;
		$max_delivery_date = $this->max_delivery_date;
		$stageday = $this->stageday;		
        return view('report.order_equip_report_export',compact('rows','order','order_stages','orderEquipment','max_delivery_date','stageday'));
    }
}
