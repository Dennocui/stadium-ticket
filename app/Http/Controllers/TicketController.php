<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use App\event;
use App\Events\ReservedTickets;
use Illuminate\Support\Facades\Storage;
use App\ticket;
use App\Http\Controllers\array_flatten;
use App\hall;
use Illuminate\Support\Facades\Auth;
use SmoDav\Mpesa\C2B\STK;
use Illuminate\Support\Arr;
use Faker\Factory;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isCustomer')) {

            $reservations = ticket::where('customer_id', Auth::user()->id)->get();
            
            
            return view('pages.ticketsView')->with('reservations', $reservations);

        }else{

            $tickets = ticket::all();

            return view('pages.tickets', compact('tickets'));

        }
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
        // $events = \App\Event::get()->pluck('title', 'id')->prepend('Please select', '');

        // return view('admin.tickets.create', compact('events'));
    }

  
    public function store(Request $request)
    {

       

        if (Gate::allows('isCustomer')) {


            
        $ticket = new ticket();
        $ticket->customer_id = $request->input('customer_id');
        $ticket->event_id = $request->input('Event_id');
        $ticket->units = $request->input('units');
        $ticket->amount = $request->input('amount');

        $ticket->save();
     
        return redirect('/event/' . $request->input('eventID'))->with('success', "Tickets Booked Successfully, Check Them in 'Reserved Tickets' Tab");
                
            }
        
        return abort(404);
    }


    public function initSTK(Request $request)
    {

        
        $uniqueCode = $this->random_number_string(5);

        $phoneNo = '254' . substr($request->phonenumber, -9);

        $mpesa_response = STK::request(intval($request->amount))
                        ->from($phoneNo)
                        ->usingReference(env('APP_NAME'),$uniqueCode)
                        ->push();

        $stk_push = $this->handleSTKrequestResp($mpesa_response);

        return $this->handleSTKrequestResp($mpesa_response);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('isCustomer')) {
            $ticket = ticket::find($id);
            if (isset($ticket)) {
                $event = event::find($ticket->event_id);
                $TimeNow = Carbon::now();
                $eventDate = Carbon::parse($event->event_Date);

                if ($TimeNow->addDays(3) < $eventDate) {
                    $ticket->delete();
                    return redirect('/ticket')->with('success', 'The Reservation Was Cancelled Successfully');
                } else {
                    return redirect('/ticket')->with('success', "Sorry, We Can't Cancel The Reservation, it's too late.");
                }
            } else {
                return abort(404);
            }
        }
        return abort(404);
    }
}
