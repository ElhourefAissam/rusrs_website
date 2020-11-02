<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Exception;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        if(request('q') != null){
            return Program::where('title','like','%'.request('q').'%')->orderBy('created_at','desc')->paginate(6);
        }
        return Program::orderBy('created_at','desc')->paginate(6);
    }

    // is facebook required
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => 'required',
                'link' => 'required',
            ]);

            $created = Program::create([
                'title' => $request->title,
                'link' => $request->link,
            ]);

                if($created)
                    return ["success"=>true];
                else
                    return ["success"=>false];

        }catch(Exception $e){
            return ["success"=>false];
        }
    }

    public function show($id)
    {
        return Program::findOrFail($id);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            "title" => "required",
            "link"  => "required",
        ]);


        $program = Program::findOrFail($id);
        $program->title = $request->title;
        $program->link = $request->link;

        $result=$program->save();
        if($result){
            return ["result" => "Updated "];
        }else{
            return ["result"=>"not updated"];
        }
    }

    public function destroy($id)
    {
        Program::destroy($id);
    }
}
