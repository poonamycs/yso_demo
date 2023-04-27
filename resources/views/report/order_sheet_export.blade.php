<table>
    <thead>
        <tr class="stages-th">
            <th class="service">Sr. no.</th>
            <th class="service">SO no.</th>
            <th class="desc">Client name</th>
            <th class="desc">Equipments</th>
            <th class="desc">Assignee</th>
            <th class="desc">Delivery Date</th>
            <th class="desc">Project Amount</th>
            <th class="desc">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;?>
        @foreach($allOrders as $order)
        <tr class="stages">
            <td class="service">{{$i++}}</td>
            <td class="service">{{ $order->so }}</td>
            <td class="desc text-center">{{ $order->client_name }}</td>
            <td class="align-middle">
                <div class="overflow-auto" style="max-height: 100px;">
                    @foreach($order->orderEquipments as $row)
                    {{$loop->index+1}}. {{ $row->equipment_name }} <small class="badge badge-purple-transparent">{{getEquipmentStatus($order->id,$row->id)}}%</small>
                    <div class="progress mt-1 mb-1" data-bs-toggle="tooltip" title="{{getEquipmentStatus($order->id,$row->id)}}% Complete"> <div class="progress-bar ht-2 @if(getEquipmentStatus($order->id,$row->id) == '100') bg-success @else bg-info progress-bar-striped @endif" style="width: {{getEquipmentStatus($order->id,$row->id)}}%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div> </div>
                    @endforeach
                </div>
            </td>
            <td class="align-middle">
            @foreach(App\Models\Admin::select('id','name')->get() as $user)
                {{$user->name}}
            @endforeach
            </td>
            <td class="align-middle d-none">{{ date('d M Y', strtotime($order->delivery_date)) }}</td>
            <td class="align-middle">
                {{$order->po_amt}}
            </td>
            <td class="text-center align-middle">
                {{ $order->status }}
                
            </td>
            
        </tr>
        @endforeach  
    </tbody>
</table>