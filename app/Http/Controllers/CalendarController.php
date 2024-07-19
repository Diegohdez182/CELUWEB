<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $all_events=Event::all();
        $events=[];
        foreach($all_events as $event)
        {
            $events[]=[
                'title'=>$event->event,
                'start'=>$event->start_date,
                'end'=>$event->end_date,                
            ]; 
        }
        return view("dashboard", compact('events'));
    }
/*
    public function store(Request $request){
        Event::create([
            'event'=>$request->event,
            'start_time'=>$request->start_date,
            'end_time'=>$request->start_date,
        ]);

    }
*/
}
