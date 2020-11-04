<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public static $id = null;

    public function index()
    {
        if(request('q') != null){
            return Event::with("photos")
                    ->where('title','like','%'.request('q').'%')
                    ->orderBy('created_at','desc')
                    ->paginate(6);
        }
        return Event::with("photos")
                    ->orderBy('created_at','asc')
                    ->paginate(6);
    }

    public function store(Request $request)
    {

        if(!$request->hasFile("files"))
        {

          $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'place'         => 'required',
            'address'       => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
           ]);

             $addedEvent = Event::create([
                'title'         => $request->title,
                'description'   => $request->description,
                'place'         => $request->place,
                'address'       => $request->address,
                'start_date'    => $request->start_date,
                'end_date'      => $request->end_date,
            ]);

            if($addedEvent){
                return response()->json(["id"=>$addedEvent->id, "success"=> true]);
            }else
            {
                return response()->json(["success"=> false]);
            }
        }
        else
        {
            $imageController= new ImageController;
            $id             = $imageController->ModelIdFinder($request);
            $eventModel     = Event::find($id);

            return $imageController->store($request, $eventModel);
        }
    }

    public function show($id)
    {
        return Event::finnOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required',
            'place'         => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->title       = $request->title;
        $event->description = $request->description;
        $event->place       = $request->place;
        $event->address     = $request->address;
        $event->start_date  = $request->start_date;
        $event->end_date    = $request->end_date;

        $saved = $event->save();

        if($saved) return response()->json(["success"=> true]);
          else     return response()->json(["success"=> false]);
    }

    public function destroy($id)
    {
        $deleted = Event::destroy($id);

        if($deleted) return response()->json(["success"=> true]);
          else       return response()->json(["success"=> false]);
    }
}
