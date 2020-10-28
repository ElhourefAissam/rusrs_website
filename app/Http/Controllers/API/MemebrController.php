<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemebrController extends Controller
{
    public function index()
    {
        if(request('q') != null){
            return Member::where('full_name','like','%'.request('q').'%')->orderBy('created_at','desc')->paginate(6);
        }
        return Member::orderBy('created_at','desc')->paginate(6);
    }

    // is facebook required
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'facebook' => 'required',
            'position' => 'required',
        ]);

        $created = Member::create([
            'full_name' => $request->full_name,
            'facebook' => $request->facebook,
            'position' => $request->position,
        ]);

            if($created)
                return ["success"=>"Member created"];
            else
                return ["error"=>"Member was not created"];
    }

    public function show($id)
    {
        return Member::findOrFail($id);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'full_name' => 'required',
            'facebook' => 'required',
            'position' => 'required',
        ]);


        $member = Member::findOrFail($id);
        $member->full_name = $request->full_name;
        $member->facebook = $request->facebook;
        $member->position = $request->position;

        $result=$member->save();
        if($result){
            return ["result" => "Updated "];
        }else{
            return ["result"=>"not updated"];
        }
    }

    public function destroy($id)
    {
        Member::destroy($id);
    }
}
