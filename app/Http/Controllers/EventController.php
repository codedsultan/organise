<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(){
        $events = Event::orderBy('id','desc')->paginate(8);
        // dd($events[0]->featured_image);
        // dd(!Auth::guard('organiser')->check());
        return view('index',compact('events'));
    }

    public function show($id){
        $event = Event::where('id',$id)->with('tickets')->first();
        // dd($event->tickets);
        return view('event.show',compact('event'));
    }

}
