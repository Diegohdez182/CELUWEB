<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $allEvents=Event::all();
        $eventos=[];
        foreach($allEvents as $event)
        {
            $eventos[]=[
                'title'=>$event->event,
                'start'=>$event->start_date,
                'end'=>$event->end_date,                
            ]; 
        }

        return view("dashboard", compact('eventos'));

    }
}
