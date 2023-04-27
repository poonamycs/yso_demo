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
<table>
<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">Client</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">name</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"colspan="6"><img src="{{url('asset/favicon-chemdist')}}"></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF" style="background-color:yellow"></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">PO No.</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">number</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF" style="background-color:green"></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">PO Date</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">Date</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF" style="background-color:red"></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">CDPS</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">667</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF" style="background-color:sky-blue"></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">Project</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">project</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF" style="background-color:mustard"></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">Equipment</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">equi</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF"></td>
	</tr>
</table>
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
		<td height="20" align="left" valign=bottom><font face="Calibri" color="#548135"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">Client Name</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">Equip. Name &amp;<br> TAG No.</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">SO Number</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">Total Handling<br> Time for SO</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">SO Execution<br> START DATE</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #ffffff" align="center" valign=middle bgcolor="#BF9000"><b><font face="Calibri" color="#FFFFFF">SO Execution<br> END DATE</font></b></td>
		<td align="center" valign=middle><b><font face="Calibri" color="#FFFFFF"><br></font></b></td>
		{{-- @for($i = 0; $i<$daysInterval; $i++)
		<td align="center" valign=bottom><font face="Calibri" color="#548135"><br></font></td>
		@endfor --}}
	</tr>
	<tr>
		<td height="20" align="left" valign=bottom><font face="Calibri" color="#548135"><br></font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-weight: bold; color: #BF9000" align="center" valign=middle><font face="Calibri" color="#BF9000">{{$order->client_name}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-weight: bold; color: #BF9000" align="center" valign=middle><font face="Calibri" color="#BF9000">{{$orderEquipment->equipment_type}} <br> {{$orderEquipment->equipment_name}}-{{$orderEquipment->tag}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-weight: bold; color: #BF9000" align="center" valign=middle sdval="510" sdnum="1033;"><font face="Calibri" color="#BF9000">{{$order->so}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-weight: bold; color: #BF9000" align="center" valign=middle sdval="102" sdnum="1033;"><font face="Calibri" color="#BF9000">{{$daysInterval}} Days</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-weight: bold; color: #BF9000" align="center" valign=middle sdval="44166" sdnum="1033;0;MMM DD\, YYYY"><font face="Calibri" color="#BF9000">{{ date('M d, Y', strtotime($order->created_at))}}</font></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; font-weight: bold; color: #BF9000" align="center" valign=middle sdval="44268" sdnum="1033;0;MMM DD\, YYYY"><font face="Calibri" color="#BF9000">{{ date('M d, Y', strtotime($order->delivery_date))}}</font></td>
		<td align="center" valign=middle sdnum="1033;0;MMM DD\, YYYY"><font face="Calibri" color="#BF9000"><br></font></td>
		{{-- @for($i = 0; $i<$daysInterval; $i++)
		<td align="center" valign=bottom><font face="Calibri" color="#548135"><br></font></td>
		@endfor --}}
	</tr>
	
	
	<tr></tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="#000000">Sr.</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="#000000">Task Description</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="#000000">Task Status</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="#000000">Planned / Actual Completion </font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="#000000">Task Duration</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="#000000">Task Start Date</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="#000000">Task End Date</font></b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#A8D08D"><b><font face="Calibri" size=4 color="#000000">Remarks <br>(for any delays / <br>Holds in specific tasks)</font></b></td>
		@php $period = CarbonPeriod::create(Carbon::parse($order->created_at), Carbon::parse($order->delivery_date)->addDay()); @endphp
		@foreach ($period as $date)
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000;" align="center" valign=bottom bgcolor="#A8D08D" sdval="44195" sdnum="1033;0;MMM DD\, YYYY"><font face="Comic Sans MS" color="#000000">{{date('M d, Y', strtotime($date))}}</font></td>
		@endforeach
	</tr>
	@foreach($order_stages as $stage)
	<?php $daysToAdd = $stage->days;
			?>
	<?php $taskTime = Carbon::parse($stage->completed_at)->diffInDays(Carbon::parse($stage->started_at))+1; ?>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" rowspan=2 height="40" align="center" valign=middle sdval="1" sdnum="1033;"><b><font face="Calibri" color="#548135">{{$loop->index+1}}</font></b></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle;" rowspan=2 align="left" valign=middle><font face="Calibri" color="#548135">{{$stage->stage_name}}</font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; vertical-align: middle; text-align: center" rowspan=2 align="center" valign=middle><font face="Calibri" color="#548135">@if(!empty($stage->status)){{$stage->status}}@else NA @endif</font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000; color: #548135" align="center" valign=middle><font face="Calibri" color="#548135">Planned</font></td>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font face="Calibri" color="#548135">{{$stage->days}}</font></td>
		<!-- planned stage started date -->
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="44195" sdnum="1033;0;MMM DD\, YYYY"><font face="Calibri" color="#548135">{{ date('M d, Y', strtotime($order->created_at))}}</font></td>
		<!-- planned stage completed date -->
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="44195" sdnum="1033;0;MMM DD\, YYYY"><font face="Calibri" color="#548135">{{ Carbon::parse($order->created_at)->addDays($daysToAdd)->format('M d, Y')}}</font></td>
		<!-- note -->
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;0;MMM DD\, YYYY"><font face="Calibri" color="#548135">{{$stage->remark}}</font></td>
		@for($i = 0; $i<$stage->days; $i++)
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#008000"><font face="Calibri" color="#008000"></font></td>
		@endfor
	</tr>
	
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000; color: #FF0000" align="center" valign=middle><font face="Calibri" color="#FF0000">Actual</font></td>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><font face="Calibri" color="#FF0000"><?php if($stage->started_at){?> @if($taskTime > 0) {{$taskTime}} @else - @endif<?php }?></font></td>
		<!-- actual stage started date -->
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;0;MMM DD\, YYYY"><font face="Calibri" color="#FF0000">@if($stage->started_at){{date('M d, Y', strtotime($stage->started_at))}}@endif</font></td>
		<!-- actual stage completed date -->
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;0;MMM DD\, YYYY"><font face="Calibri" color="#FF0000">@if($stage->completed_at){{date('M d, Y', strtotime($stage->completed_at))}}@endif</font></td>
		<!-- note -->
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdnum="1033;0;MMM DD\, YYYY"><font face="Calibri" color="#FF0000"></font></td>
		@if($stage->started_at)
		@for($i = 0; $i<$taskTime; $i++)
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom bgcolor="#32CD32"><font face="Calibri" color="#32CD32"></font></td>
		@endfor
		@endif
	</tr>
	@endforeach
	
	
</table>