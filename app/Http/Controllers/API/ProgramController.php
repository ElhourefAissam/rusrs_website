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
                'programId' => $request->programId,
            ]);

            if($created)
                return request()->json(["success"=>true]);
            else
                return request()->json(["success"=>false]);

        }catch(Exception $e){
            return ["success"=>false, "error"=> $e];
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
            'programId' => $request->programId,
        ]);


        $program = Program::findOrFail($id);
        $program->title = $request->title;
        $program->link = $request->link;

        $result=$program->save();
        if($result){
            request()->json(["success"=>true]);
        }else{
            request()->json(["success"=>false]);
        }
    }

    public function destroy($id)
    {
        $removed = Program::destroy($id);
        if($removed) request()->json(["success"=>true]);
        else request()->json(["success"=>false]);
    }
}
