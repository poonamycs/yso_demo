<h4>HOT Enquiries ({{count($hot)}})</h4>
<table class="">
    <thead>
        <tr>
            <th style="font-weight: bold">Sr.</th>
            <th style="font-weight: bold">QRN</th>
            <th style="font-weight: bold">Client</th>
            <th style="font-weight: bold">Description</th>
            <th style="font-weight: bold">Engineer</th>
            <th style="font-weight: bold">Price (in Lac)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hot as $enq)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$enq->qrn}}</td>
            <td>{{$enq->customer_name}}</td>
            <td>{!!Str::limit($enq->description, 200)!!}</td>
            <td>{{$enq->name ? getInitials($enq->name) : '-'}}</td>
            <td>{{$enq->price/100000}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th style="font-weight: bold">Total</th>
            <th style="font-weight: bold">{{($hot->sum('price'))/100000}}</th>
        </tr>
    </tfoot>
</table>
<br>
<br>

<h4>WARM Enquiries ({{count($warm)}})</h4>
<table class="table key-buttons text-md-nowrap table-hover datatab mb-0">
    <thead>
        <tr>
            <th style="font-weight: bold">Sr.</th>
            <th style="font-weight: bold">QRN</th>
            <th style="font-weight: bold">Client</th>
            <th style="font-weight: bold">Description</th>
            <th style="font-weight: bold">Engineer</th>
            <th style="font-weight: bold">Price (in Lac)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($warm as $enq)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$enq->qrn}}</td>
            <td>{{$enq->customer_name}}</td>
            <td>{!!Str::limit($enq->description, 200)!!}</td>
            <td>{{$enq->name ? getInitials($enq->name) : '-'}}</td>
            <td>{{$enq->price/100000}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th style="font-weight: bold">Total</th>
            <th style="font-weight: bold">{{($warm->sum('price'))/100000}}</th>
        </tr>
    </tfoot>
</table>
<br>
<br>

<h4>LONG LEAD Enquiries ({{count($longlead)}})</h4>
<table class="table key-buttons text-md-nowrap table-hover datatab mb-0">
    <thead>
        <tr>
            <th style="font-weight: bold">Sr.</th>
            <th style="font-weight: bold">QRN</th>
            <th style="font-weight: bold">Client</th>
            <th style="font-weight: bold">Description</th>
            <th style="font-weight: bold">Engineer</th>
            <th style="font-weight: bold">Price (in Lac)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($longlead as $enq)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$enq->qrn}}</td>
            <td>{{$enq->customer_name}}</td>
            <td>{!!Str::limit($enq->description, 200)!!}</td>
            <td>{{$enq->name ? getInitials($enq->name) : '-'}}</td>
            <td>{{$enq->price/100000}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th ></th>
            <th ></th>
            <th ></th>
            <th ></th>
            <th style="font-weight: bold">Total</th>
            <th style="font-weight: bold">{{($longlead->sum('price'))/100000}}</th>
        </tr>
    </tfoot>
</table>