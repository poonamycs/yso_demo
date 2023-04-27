<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use GuzzleHttp\Client;

class FullCalenderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
  
        if($request->ajax()) {
            
             $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end','color_code as backgroundColor','time as eventTimeFormat']);
                   
             foreach($data as $key => $record) {
                $data[$key]['start'] = $record['start'].'T'.$record['eventTimeFormat'].':00';
                // $data[$key]['end'] = $record['end'].'T'.$record['timeZone'].':00';
             }
             return response()->json($data);
        }
        $data = Event::all();
        return view('admin/event/fullcalender')->with(['data'=>$data]);
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
        switch ($request->type) {
           case 'add':   
            $dates = explode(' - ', $request->date);
            $start_date = Carbon::parse($dates[0]);
            $end_date = Carbon::parse($dates[1])->addDay();   
              $event = Event::create([
                  'title' => $request->title,
                  'start' => $start_date,
                  'end' => $end_date,
                  'color_code' => $request->color,
                  'time' => $request->time,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
    public function listviewplanner(Request $request)
    {
        $from = $request->from ? $request->from : Carbon::now()->format('Y-m-d');
        $to = $request->to ? $request->to : Carbon::now()->format('Y-m-d'); 
        $title = $request->title ? $request->title : ' ';
        $events = Event::paginate(10);
        if($request->has('from') && $request->from != null){
            $events = Event::whereDate('start','>=',$from)->whereDate('end','<=',$to);
            $from = $request->from;
            $to = $request->to ? $request->to : NULL; 
            $events = $events->paginate(10);
        }
        if($request->title){
            $title = $request->title;
            $events = Event::where('title','like','%'.$title.'%');
            $events = $events->paginate(10);
        }
        return view('admin/event/listcalender')->with(['events'=>$events,'title'=>$title,'from'=>$from,'to'=>$to]);
    }
    // public function listviewplanner(Request $request)
    // {
            
    //         $curl = curl_init();
    //         curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://graph.facebook.com/v16.0/109761308764188/messages',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS =>'{
    //             "messaging_product": "whatsapp",
    //             "to": "919887687779",
    //             "type": "contacts",
    //             "contacts": [{
    //                 "name": $request->message,
    //                   }],
    //         }',
    //         // CURLOPT_POSTFIELDS =>'{
    //         //     "messaging_product": "whatsapp",
    //         //     "to": "919887687779",
    //         //     "type": "template",
    //         //     "name": $request->name,
    //         //     "template": {
    //         //         "name": "hello_world",
    //         //         "language": {
    //         //             "code": "en_US"
    //         //         }
    //         //     }
    //         // }',
    //         CURLOPT_HTTPHEADER => array(
    //             'Content-Type: application/json',
    //             'Authorization: Bearer EAAHg3dbZBlbgBAEKFjWygr6yjZBHuRp9aBQR7TtXqslCrHBVpZAzm7SWXmAq282hTgxM3PvZBwkQ0emaYC9bZCQMyjQjMwxUQYV1rlkETCoV8PsHlvaxnzEnVYkJdwfCDbNy6cZBbWrdVUn39wqddSWY2LWhyNnHluAlwYnBb2nZALdBUZCzgW14zuyg0XHl3CnKgTj1CI7Y2ZB3nW3NzlFki'
    //         ),
    //         ));
    //         $response = curl_exec($curl);

    //     curl_close($curl);
    //     echo $response;
    // }
}
