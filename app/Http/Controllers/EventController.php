<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::orderBy('id','desc')->paginate(6);
        return view('index',compact('events'));
    }

}
