@php 
    $poTotal = 0; 
    $temp = explode('-',$fy); 
@endphp
<table>
    <thead>
        <tr>
            <th>FY {{$temp[0]}}-{{$temp[1]}}</th>
            <th>June {{$temp[0]}}</th>
            <th>Sept {{$temp[0]}}</th>
            <th>Dec {{$temp[1]}}</th>
            <th>Mar {{$temp[1]}}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td>Q1</td>
            <td>Q2</td>
            <td>Q3</td>
            <td>Q4</td>
            <td>Rs Lacs</td>
        </tr>
        @if($target)
        <tr>
            <td>Booking Target</td>
            <td>{{$btq1 = json_decode($target->btarget)->bq1}}</td>
            <td>{{$btq2 = json_decode($target->btarget)->bq2}}</td>
            <td>{{$btq3 = json_decode($target->btarget)->bq3}}</td>
            <td>{{$btq4 = json_decode($target->btarget)->bq4}}</td>
            <td>{{$bt = $btq1+$btq2+$btq3+$btq4}}</td>
        </tr>
        <tr>
            <td>Sales Target </td>
            <td>{{$stq1 = json_decode($target->starget)->sq1}}</td>
            <td>{{$stq2 = json_decode($target->starget)->sq2}}</td>
            <td>{{$stq3 = json_decode($target->starget)->sq3}}</td>
            <td>{{$stq4 = json_decode($target->starget)->sq4}}</td>
            <td>{{$bt = $stq1+$btq2+$stq3+$stq4}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Booking Till Date</td>
            <td>{{$bq1 = ($q1->sum('order_size'))/100000}}</td>
            <td>{{$bq2 = ($q2->sum('order_size'))/100000}}</td>
            <td>{{$bq3 = ($q3->sum('order_size'))/100000}}</td>
            <td>{{$bq4 = ($q4->sum('order_size'))/100000}}</td>
            <td>{{ $btdate = $bq1 + $bq2 + $bq3 + $bq4 }}</td>
        </tr>
        <tr>
            <td>Booking Shortfall</td>
            <td>{{$btemp1 = $bq1-(json_decode($target->btarget)->bq1)}}</td>
            <td>{{$btemp2 = $bq2-(json_decode($target->btarget)->bq2)+$btemp1}}</td>
            <td>{{$btemp3 = $bq3-(json_decode($target->btarget)->bq3)+$btemp2}}</td>
            <td>{{$btemp4 = $bq4-(json_decode($target->btarget)->bq4)+$btemp3}}</td>
            <td>{{$btemp4}}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Sales Till Date</td>
            <td>{{($sq1 = $saleq1->sum('order_size'))/100000}}</td>
            <td>{{($sq2 = $saleq2->sum('order_size'))/100000}}</td>
            <td>{{($sq3 = $saleq3->sum('order_size'))/100000}}</td>
            <td>{{($sq4 = $saleq4->sum('order_size'))/100000}}</td>
            <td>{{ $stdate = $sq1 + $sq2 + $sq3 + $sq4 }}</td>
        </tr>
        <tr>
            <td>Sales Shortfall</td>
            <td>{{$stemp1 = $sq1-(json_decode($target->starget)->sq1)}}</td>
            <td>{{$stemp2 = $sq2-(json_decode($target->starget)->sq2)+$stemp1}}</td>
            <td>{{$stemp3 = $sq3-(json_decode($target->starget)->sq3)+$stemp2}}</td>
            <td>{{$stemp4 = $sq4-(json_decode($target->starget)->sq4)+$stemp3}}</td>
            <td>{{$stemp4}}</td>
        </tr>
        @else
        <div class="alert alert-dark">
            No data found
        </div>
        @endif
    </tbody>
</table>


<br>
<br>
<table>
    <tbody>
        @foreach($poAwaited as $po)
        <tr>
            @if($loop->first)
            <td>PO Awaited</td>
            @else
            <td></td>
            @endif
            <td>{{$po->customer_name}}</td>
            <td>{{$po->price/100000}}</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td>Total</td>
            <td>{{ $poTotal = $poAwaited->sum('price')/100000}}</td>
        </tr>
    </tbody>
</table>


<br>
<br>
<table>
    <tbody>
        <tr>
            <td>PO Awaited</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$poTotal}}</td>
        </tr>
        <tr>
            <td>Booking + PO Awaited</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$btdate + $poTotal}}</td>
        </tr>
        <tr>
            <td>Last Year Carry Forward</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$target->ly_carryforw}}</td>
        </tr>
        <tr>
            <td>Current Year Carry Forward</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$target->cy_carryforw}}</td>
        </tr>
    </tbody>
</table>

<br>
<br>
<table>
    <thead>
        <tr>
            <th>Engineer</th>
            <th>Region</th>
            <th>Target</th>
            <th>Achieved</th>
            <th>Achieved %</th>
            <th>Shortfall</th>
        </tr>
    </thead>
    <tbody>
        @php $grandtotal = 0; $per = 0; @endphp
        @foreach($setargets as $se)
        <tr>
            <td>
                @foreach($se->sengg as $val) 
                    {{user($val)}} @if($loop->last) @else + @endif 
                @endforeach
            </td>
            <td>
                @foreach($se->region as $temp) 
                    {{ $temp}} @if($loop->last) @else + @endif 
                @endforeach
            </td>
            <td>{{$se->target}} </td>
            <td>
                @foreach($se->sengg as $val)
                    @if($loop->first)
                    {{$ordertotal = orderTotal($val, $fy)/100000}} 
                    @endif
                @endforeach 
            </td>
            <td>{{$per1 = $ordertotal/$se->target }}%</td>
            <td>{{round($ordertotal - $se->target, 3)}}</td>
        </tr>
        <?php 
            $grandtotal = $grandtotal + $ordertotal;
            $per = $per + $per1;
        ?>
        @endforeach
        <tr>
            <td></td>
            <td>Total</td>
            <td>{{$setargets->sum('target')}}</td>
            <td>{{$grandtotal}}</td>
            <td>{{$per}}%</td>
            <td>{{$grandtotal - $setargets->sum('target')}}</td>
        </tr>
    </tbody>
</table>