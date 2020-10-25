<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return Event::orderBy('start_date','asc')->paginate(9);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'adress' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Event::create([
            'title' => $request->title,
            'content' => $request->description,
            'content' => $request->place,
            'content' => $request->adress,
            'content' => $request->start_date,
            'image' => $request->end_date,
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
            'adress' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->adress = $request->adress;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->save();
    }

    public function destroy($id)
    {
        Event::destroy($id);
    }
}
