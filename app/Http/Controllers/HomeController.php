<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Kanban;
use App\Models\Enquiry;
use App\Models\User;
use App\Models\PaymentCashflow;
use carbon\carbon;
use Auth;

class HomeController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index(){
        return view('home');
    }

    public function planning(Request $request){
        $cards = Kanban::where('admin_id',Auth::id())->get();
        // dd($cards);
        // $cards = json_decode(json_encode($cards));
        $meta_title = 'Planning';
        return view('admin.kanban.kanban_board')->with(compact('cards','meta_title'));
    }

    public function addTask(Request $request){
        $kanban = new Kanban;
        $kanban->title = $request->input('title');
        $kanban->content = $request->input('description');
        $kanban->admin_id = Auth::User()->id;
        $kanban->type_id = '1';
        $kanban->save();
        return 200;
    }

    public function getCards (Request $request){
        // return Auth::id();
        $cards = Kanban::get();
        $cards = json_decode(json_encode($cards));
        return $cards;
        // return response()->json(['cards'=>$cards]);
    }

    // enquiry reminder cron job
    public function enquiryReminder($date=null){
        $today = date('Y-m-d H:i');
        $allEnquiries = Enquiry::select('enquiry.customer_name','enquiry.reminder_date','enquiry.reminder_note','admins.email','admins.name')->join('admins','enquiry.admin_id','admins.id')->where('reminder_date','!=',NULL)->whereDate('enquiry.reminder_date','>=',date('Y-m-d'))->get();
        foreach ($allEnquiries as $enq) {
            // dd(date('Y-m-d H:i', strtotime($enq->reminder_date)) .'-'.date('Y-m-d H:i', strtotime($today)));
            if(strtotime($enq->reminder_date) == strtotime($today)){
                echo $enq->customer_name.'-'. $enq->email.'<br>';

                $email = $enq->email;
                $name = $enq->name;
                $messageData = [
                    'email'=>$email,
                    'name'=>$name,
                    'customer_name'=>$enq->customer_name,
                    'note'=>$enq->reminder_note,
                ];
                Mail::send('emails.enquiryReminder',$messageData,function($message) use($email){
                    $message->to($email)->subject('Enquiry Reminder - YSO');
                });
            }else{
                echo 'No reminder found';
            }
        }
    }

    // payment cycle reminder
    public function paymentCycleReminder($date=null){
        $from = date('Y-m-d', strtotime(new Carbon('first day of this month')));
        $to = date('Y-m-d', strtotime(new Carbon('last day of this month')));
        $cycles = PaymentCashflow::select('payment_cashflow.*','payment_cashflow.date','admins.email','admins.name')->join('admins','payment_cashflow.admin_id','admins.id')->whereBetween('date', [$from, $to])->get();
        $threeDate =  Carbon::now()->subDays(3)->format('Y-m-d');
        foreach ($cycles as $cycle) {
            $today = date('Y-m-d');
            if(strtotime($cycle->threeDate) == strtotime($today)){
                echo $cycle->name.'-'. $cycle->email.'<br>';

                // to project sales engg.
                $email = $cycle->email;
                $name = $cycle->name;
                $messageData = [
                    'email'=>$email,
                    'name'=>$name,
                    'payment_cashflow'=>$cycle,
                ];
                Mail::send('emails.cycleReminder',$messageData,function($message) use($email){
                    $message->to($email)->subject('Payment Cycle Reminder - YSO');
                });
            }
        }
    }

}
