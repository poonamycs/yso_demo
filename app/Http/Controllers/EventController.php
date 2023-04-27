<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudEvents;

class EventController extends Controller
{
    public function EventmgtCalender(Request $request)
    {
        if($request->ajax()) {  
            $data = CrudEvents::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }
        return view('admin.event.calender');
    }
    public function calendarEvents(Request $request)
    {
        switch ($request->type) {
           case 'create':
            try {
              $event = CrudEvents::create([
                  'title' => $request->title,
                  'description' => $request->description,
                  'allDay' => $request->allDay, 
                  'start' => $request->start,
                  'end' =>  $request->end,
                  'color' => $request->color
              ]);
              if ($event)
              return response()->json($event);
            }catch (\Illuminate\Database\QueryException $exception) {
                // You can check get the details of the error using `errorInfo`:
                print_r($exception->errorInfo); die;
            
                // Return the response to the client..
            }
              
             break;
  
           case 'edit':
              $event = CrudEvents::find($request->id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'allday' => $request->allDay, 
                'start' => $request->start_date,
                'end' => $request->end_date,
                'color' => $request->color
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = CrudEvents::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # ...
             break;
        }
    }
}
