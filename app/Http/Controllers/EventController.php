<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::orderBy('id','desc')->paginate(8);
        return view('index',compact('events'));
    }

    public function show($id){
        $event = Event::where('id',$id)->with('tickets')->first();
        // dd($event->tickets);
        return view('event.show',compact('event'));
    }

}
