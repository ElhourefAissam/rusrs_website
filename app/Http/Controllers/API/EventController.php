<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        if(request('q') != null){
            return Event::where('title','like','%'.request('q').'%')->orderBy('created_at','desc')->paginate(6);
        }
        return Event::orderBy('start_date','asc')->paginate(6);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'address' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'place' => $request->place,
            'address' => $request->address,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
    }

    public function show($id)
    {
        return Event::finnOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->address = $request->address;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->save();
    }

    public function destroy($id)
    {
        Event::destroy($id);
    }
}
