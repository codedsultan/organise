<?php

namespace App\Http\Controllers\Organiser;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {
        $events = Event::where('organiser_id',$request->user()->id)->orderBy('id','desc')->paginate(20);
        return view('dashboard.organiser.event.index', compact('events'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {
        return view('dashboard.organiser.event.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(Request $request)
    {
        // $data = $request->input();
        // dd($request->input());
        $data =  $request->validate([
            'title' => ['required','string'],
            'description' => ['required','string'],
            'location' => ['required','string'],
            'bg_image' => ['required','image', 'max:2048',],
            // '' => ['required','string'],
            'start_date' => ['required','string'],
            'end_date' => ['nullable','string'],
            'start_time' => ['required','string'],
            'end_time' => ['nullable','string'],
            'venue' => ['required','string'],
            'location_address' => ['required','string'],

            'ticket_silver' => ['accepted'],
            'ticket_silver_price' => ['required_with:ticket_silver','numeric'],
            'ticket_silver_qty' => ['sometimes','integer'],
            'ticket_gold' => ['sometimes'],
            'ticket_gold_price' => ['nullable','required_with:ticket_gold','numeric'],
            'ticket_gold_qty' => ['sometimes','integer'],
            'ticket_platinum' => ['sometimes'],
            'ticket_platinum_price' => ['nullable','required_with:ticket_platinum','numeric'],
            'ticket_platinum_qty' => ['sometimes','integer'],
        ]);

        // dd($data );
        $event = new Event();
        $event->organiser_id = $request->user()->id;
        $event->title = $data['title'];
        $event->bg_image_path = $data['bg_image'];
        $event->description = $data['description'];
        $event->start_date = $data['start_date'];
        $event->end_date = isset($data['end_date']) ? $data['end_date'] : null;
        $event->venue_name = isset($data['venue_name']) ? $data['venue_name'] : null;
        $event->location = isset($data['location']) ? $data['location'] : null;
        $event->location_address = isset($data['location_address']) ? $data['location_address'] : null;



        $event->uploadMediaFromRequest(
            requestName: 'bg_image',
            collection: 'featured_image'
        );

        $event->save();

        if($data['ticket_silver']){
            $silverTicket = new Ticket();
            $silverTicket->title = 'silver';
            $silverTicket->type = 'silver';
            $silverTicket->quantity_available = isset($data['ticket_silver_qty']) ? $data['ticket_silver_qty'] : null ;
            $silverTicket->price = $data['ticket_silver_price'];
            $silverTicket->event_id = $event->id;
            $silverTicket->save();
        }

        if(isset($data['ticket_gold']) && $data['ticket_gold']){
            $goldTicket = new Ticket();
            $goldTicket->title = 'gold';
            $goldTicket->type = 'gold';
            $goldTicket->quantity_available = isset($data['ticket_gold_qty']) ? $data['ticket_gold_qty'] : null ;
            $goldTicket->price = $data['ticket_gold_price'];
            $goldTicket->event_id = $event->id;
            $goldTicket->save();
        }

        if(isset($data['ticket_gold_qty']) && $data['ticket_platinum']){
            $platinumTicket = new Ticket();
            $platinumTicket->title = 'platinum';
            $platinumTicket->type = 'platinum';
            $platinumTicket->quantity_available = isset($data['ticket_platinum_qty']) ? $data['ticket_platinum_qty'] : null ;
            $platinumTicket->price = $data['ticket_platinum_price'];
            $platinumTicket->event_id = $event->id;
            $platinumTicket->save();
        }



        return redirect()->route('organiser.events')->with('success', 'Event created successfully');

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show(Request $request,$id)
    {
        // dd($request->user()->tickets);
        $event = Event::whereId($id)->first();

        return view('dashboard.organiser.event.show',compact('event'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit(Request $request,$id)
    {
        $event = Event::whereId($id)->first();
        return view('dashboard.organiser.event.edit',compact('event'));
    }

    /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function update(Request $request,$id)
    {
        $data =  $request->validate([
            'title' => ['required','string'],
            'location' => ['required','string'],
            'bg_image_path' => ['required','string'],
            '' => ['required','string'],
            'start_date' => ['required','string'],
            'end_date' => ['sometimes','string'],
            'venue_name' => ['sometimes','string'],
            'location_address' => ['sometimes','string']

        ]);

        $event = Event::whereId($id)->first();

        $event->title = $data['title'];
        $event->bg_image_path = $data['bg_image_path'];
        $event->description = $data['description'];
        $event->start_date = $data['start_date'];
        $event->end_date = isset($data['end_date']) ? $data['end_date'] : null;
        $event->venue_name = isset($data['venue_name']) ? $data['venue_name'] : null;
        $event->location = isset($data['location']) ? $data['location'] : null;
        $event->location_address = isset($data['location_address']) ? $data['location_address'] : null;

        $event->save();

        return redirect()->route('organiser.events')->with('success','Event has been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy(Request $request,$id)
    {
        $event = Event::whereId($id)->first();
        $event->delete();

        return redirect()->route('organiser.events')->with('success','Event has been deleted successfully');
    }
}
