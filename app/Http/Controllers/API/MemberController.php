<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        if(request('q') != null){
            return Member::with("photos")
                    ->where('full_name','like','%'.request('q').'%')
                    ->orderBy('created_at','desc')
                    ->paginate(6);
        }
        return Member::with('photos')
                    ->orderBy('created_at','desc')
                    ->paginate(6);
    }

    // is facebook required
    public function store(Request $request)
    {
        if(!$request->hasFile("files"))
        {
            $request->validate([
                'full_name' => 'required',
                'position'  => 'required',
            ]);

            $member = Member::create([
                'full_name' => $request->full_name,
                'facebook'  => $request->facebook,
                'position'  => $request->position,
            ]);


          if($member) return response()->json(["id"=> $member->id, "success"=>true]);
                else  return response()->json(["success"=> false]);

        }else{

            $imageController= new ImageController;
            $id             = $imageController->ModelIdFinder($request);
            $eventModel     = Member::find($id);

            return $imageController->store($request, $eventModel);
        }
    }

    public function show($id)
    {
        return Member::findOrFail($id);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'full_name' => 'required',
            'facebook'  => 'required',
            'position'  => 'required',
        ]);


        $member = Member::findOrFail($id);
        $member->full_name  = $request->full_name;
        $member->facebook   = $request->facebook;
        $member->position   = $request->position;

        $result=$member->save();
        if($result){
            return response()->json(["success"=> true]);
        }else{
            return response()->json(["success"=> false]);;
        }
    }

    public function destroy($id)
    {
        $deleted = Member::destroy($id);

        if($deleted){
            return  response()->json(["success"=> true]);
         }else{
            return  response()->json(["success"=> false]);;
         }
    }
}
