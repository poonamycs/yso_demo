<?php 
	use carbon\carbon;
	use Carbon\CarbonPeriod;
	$daysInterval = Carbon::parse($order->delivery_date)->diffInDays(Carbon::parse($order->created_at))+2;
?>
<head>
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  }
	</style>
</head>

<table cellspacing="0" border="0">
	<colgroup width="40"></colgroup>
	<colgroup width="203"></colgroup>
	<colgroup width="134"></colgroup>
	<colgroup width="102"></colgroup>
	<colgroup width="97"></colgroup>
	<colgroup width="95"></colgroup>
	<colgroup width="197"></colgroup>
	<colgroup span="94" width="26"></colgroup>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">Client</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">{{$order->client_name}}</font></b></td>
		<td rowspan="6"><img src="{{ public_path('favicon-chemdist.png') }}" width="60px" height="300px"></td>
		<td style="background-color:yellow"></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">PO No.</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">{{$order->po}}</font></b></td>
		
		<td style="background-color:#32CD32"></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">PO Date</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">{{ date('M d, Y', strtotime($order->po_date))}}</font></b></td>
		
		<td style="background-color:red"></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">CDPS SO No.</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">{{$order->so}}</font></b></td>
		
		<td style="background-color:#00ABF0"></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">Project</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">{{$order->po}}</font></b></td>
		
		<td style="background-color:#FFDB58"></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">Equipment</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">{{$orderEquipment->equipment_type}} <br> {{$orderEquipment->equipment_name}}-{{$orderEquipment->tag}}</font></b></td>
		
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle bgcolor="#BEBEBE"><b><font face="Calibri" size=4 color="#000000">Sr.</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BEBEBE"><b><font face="Calibri" size=4 color="#000000">Task Description</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BEBEBE"><b><font face="Calibri" size=4 color="#000000">Status</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BEBEBE"><b><font face="Calibri" size=4 color="#000000">Action</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#BEBEBE"><b><font face="Calibri" size=4 color="#000000">Total Days </font></b></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  height="20" align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="red"></font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="red">{{$orderEquipment->equipment_type}}</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="red"></font></b></td>
		
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="red">Schedule </font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"  align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="red"> </font></b></td>
		
		<!-- @php $period = CarbonPeriod::create(Carbon::parse($order->created_at), Carbon::parse($max_delivery_date->completed_at)->addDay()); @endphp -->
		@php $period = CarbonPeriod::create(Carbon::parse($order->created_at), $stageday); @endphp
		@foreach ($period as $date)
			@if($date->format('l') == "Sunday")
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000;" align="center" valign=bottom bgcolor="#FFDB58" sdval="44195" sdnum="1033;0;MMM DD\, YYYY"><font face="Comic Sans MS" color="#000000">{{date('M', strtotime($date))}}</font></td>
			@else
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000;" align="center" valign=bottom bgcolor="#A8D08D" sdval="44195" sdnum="1033;0;MMM DD\, YYYY"><font face="Comic Sans MS" color="#000000">{{date('M', strtotime($date))}}</font></td>
			@endif
		@endforeach
	</tr>
		
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
		@php $period = CarbonPeriod::create(Carbon::parse($order->created_at), $stageday); @endphp
		@foreach ($period as $date)
		@if($date->format('l') == "Sunday")
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000;" align="center" valign=bottom bgcolor="#FFDB58" sdval="44195" sdnum="1033;0;MMM DD\, YYYY"><font face="Comic Sans MS" color="#000000">{{date('d', strtotime($date))}}</font></td>
		@else
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000;" align="center" valign=bottom bgcolor="#A8D08D" sdval="44195" sdnum="1033;0;MMM DD\, YYYY"><font face="Comic Sans MS" color="#000000">{{date('d', strtotime($date))}}</font></td>
		@endif
		@endforeach
	</tr>

	<?php $planned_days = array(); $yellowCounter = 0; ?>
	@foreach($order_stages as $stage)
	<?php $start_date = $stage->started_at;
		  $start_date = date('d M Y', strtotime($start_date));
		  $daysToAdd = $stage->days;
	?>
	<?php $taskTime = Carbon::parse($stage->completed_at)->diffInDays(Carbon::parse($stage->started_at))+1; ?>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" rowspan=2 height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">{{$loop->index+1}}</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" rowspan=2 align="left" valign=middle><font face="Calibri" color="#548135">{{$stage->stage_name}}</font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle; text-align: center" rowspan=2 align="center" valign=middle><font face="Calibri" color="#548135">@if(!empty($stage->status)){{$stage->status}}@else NA @endif</font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; color: #548135" align="center" valign=middle><font face="Calibri" color="#548135">Planned</font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font face="Calibri" color="#548135">{{$stage->days}}</font></td>
		<!-- @php $period = CarbonPeriod::create(Carbon::parse($order->created_at), Carbon::parse($max_delivery_date->completed_at)->addDay()); @endphp -->
			<!-- @foreach ($period as $date) -->
			<!-- @if(array_sum($planned_days) > 0)  -->
				<!-- @for($i = 0; $i < array_sum($planned_days); $i++) -->
					<!-- @if($date->format('l') != "Sunday") -->
					<!-- <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #FF0000" align="center" valign=middle></td> -->
					<!-- @endif -->
				<!-- @endfor -->
			<!-- @endif -->
			<!-- @for($i = 0; $i < $stage->days; $i++) -->
				<!-- @if($date->format('l') != "Sunday") -->
					<!-- <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="yellow"><font face="Calibri" color="#008000"></font></td> -->
				<!-- @endif -->
			<!-- @endfor -->
			<!-- @endforeach -->
		@for($i = 0; $i<=$yellowCounter; $i++)
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom>.
			</td>
		@endfor
		@for($i=0; $i<$stage->days; $i++)
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="yellow">
				<font face="Calibri" color="#008000"></font>
			</td>
		@endfor
			
	</tr>
	
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #FF0000" align="center" valign=middle><font face="Calibri" color="#FF0000">Actual</font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font face="Calibri" color="#FF0000"><?php if($stage->started_at){?> @if($taskTime > 0) {{$taskTime}} @else - @endif<?php }?></font></td>
		<!-- @php $period = CarbonPeriod::create(Carbon::parse($order->created_at), Carbon::parse($max_delivery_date->completed_at)->addDay()); @endphp -->
		
		<?php 
			$yellowCounter += $i;
			$tt = $order->toArray();
			$startDate = strtotime(date('Y-m-d', strtotime($stage->started_at)));
			$orderCreatedDate = strtotime(date('Y-m-d', strtotime($order->created_at)));
			
			array_push($planned_days, $stage->days);
			$j = 1;
			while( $orderCreatedDate <= $startDate ) {
				if ($startDate === $orderCreatedDate) {
					for ($i = 1; $i <= $taskTime; $i++) {	
						echo '<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#32CD32"><font face="Calibri" color="#32CD32"></font></td>';
					}
				} 
				else {
					echo '<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #FF0000" align="center" valign=middle></td>';
				}
				$orderCreatedDate = strtotime("+".$j." day", $orderCreatedDate);
				$j++;
			}
		?>
	</tr>
	@endforeach
	
</table>