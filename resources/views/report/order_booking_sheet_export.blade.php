<table id="" class="table key-buttons text-md-nowrap table-hover datatab">
        <thead>
            <tr>
                <th class="border-bottom-0 text-center">SO No.</th>
                <th class="border-bottom-0 text-left">Company Name</th>
                <th class="border-bottom-0 text-center">Region</th>
                <th class="border-bottom-0 text-center">Location</th>
                <th class="border-bottom-0 text-center">Engineer</th>
                <th class="border-bottom-0 text-center">Description</th>
                <th class="border-bottom-0 text-center">Order Value (RS Lacs)</th>
                <th class="border-bottom-0 text-center">PO Date</th>
                <th class="border-bottom-0 text-center">Delivery Date</th>
                <th class="border-bottom-0 text-center">Achieved Target</th>
            </tr>
        </thead>
        <tbody>
            @foreach($q1 as $order1)
            <tr class="border-black">
                <td class="text-center">{{$order1->so}}</td>
                <td class="text-left">{{$order1->client_name}}</td>
                <td class="text-center">{{$order1->region}}</td>
                <td class="text-center">{{$order1->country}}</td>
                <td class="text-center" data-bs-toggle="tooltip" title="{{$order1->name}}">{{getInitials($order1->name)}}</td>
                <td class="text-center">{{$order1->description}}</td>
                <td class="text-center">{{$order1->order_size/100000}}</td>
                <td class="text-center">{{date('d-M-y', strtotime($order1->po_date))}}</td>
                <td class="text-center">{{date('d-M-y', strtotime($order1->delivery_date))}}</td>
                <td class="text-center @if($loop->first) bg-primary fw-500 @endif">@if($loop->first) {{($q1->sum('order_size'))/100000}} @endif</td>
            </tr>
            @endforeach
            @foreach($q2 as $order2)
            <tr @if($loop->last) class="border-black" @endif>
                <td class="text-center">{{$order2->so}}</td>
                <td class="text-left">{{$order2->client_name}}</td>
                <td class="text-center">{{$order2->region}}</td>
                <td class="text-center">{{$order2->country}}</td>
                <td class="text-center" data-bs-toggle="tooltip" title="{{$order2->name}}">{{getInitials($order2->name)}}</td>
                <td class="text-center">{{$order2->description}}</td>
                <td class="text-center">{{$order2->order_size/100000}}</td>
                <td class="text-center">{{date('d-M-y', strtotime($order2->po_date))}}</td>
                <td class="text-center">{{date('d-M-y', strtotime($order2->delivery_date))}}</td>
                <td class="text-center @if($loop->first) bg-primary fw-500 @endif">@if($loop->first) {{($q2->sum('order_size'))/100000}} @endif</td>
            </tr>
            @endforeach
            @foreach($q3 as $order3)
            <tr @if($loop->last) class="border-black" @endif>
                <td class="text-center">{{$order3->so}}</td>
                <td class="text-left">{{$order3->client_name}}</td>
                <td class="text-center">{{$order3->region}}</td>
                <td class="text-center">{{$order3->country}}</td>
                <td class="text-center" data-bs-toggle="tooltip" title="{{$order3->name}}">{{getInitials($order3->name)}}</td>
                <td class="text-center">{{$order3->description}}</td>
                <td class="text-center">{{$order3->order_size/100000}}</td>
                <td class="text-center">{{date('d-M-y', strtotime($order3->po_date))}}</td>
                <td class="text-center">{{date('d-M-y', strtotime($order3->delivery_date))}}</td>
                <td class="text-center @if($loop->first) bg-primary fw-500 @endif">@if($loop->first) {{($q3->sum('order_size'))/100000}} @endif</td>
            </tr>
            @endforeach
            @foreach($q4 as $order4)
            <tr @if($loop->last) class="border-black" @endif>
                <td class="text-center">{{$order4->so}}</td>
                <td class="text-left">{{$order4->client_name}}</td>
                <td class="text-center">{{$order4->region}}</td>
                <td class="text-center">{{$order4->country}}</td>
                <td class="text-center" data-bs-toggle="tooltip" title="{{$order4->name}}">{{getInitials($order4->name)}}</td>
                <td class="text-center">{{$order4->description}}</td>
                <td class="text-center">{{$order4->order_size/100000}}</td>
                <td class="text-center">{{date('d-M-y', strtotime($order4->po_date))}}</td>
                <td class="text-center">{{date('d-M-y', strtotime($order4->delivery_date))}}</td>
                <td class="text-center @if($loop->first) bg-primary fw-500 @endif">@if($loop->first) {{($q4->sum('order_size'))/100000}} @endif</td>
            </tr>
            @endforeach
        </tbody>
    </table>