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

            if ($created)
                 return  response()->json(["id"      => $created->id, "success" => true]);
            else return  response()->json(["success" => false]);

        }catch(Exception $e){
            dd($e);
            return request()->json(["success"=>false, "error"=> $e->getMessage()]);
        }
    }

    public function show($id)
    {
        return Program::findOrFail($id);
    }

    public function update(Request $request,$id)
    {
        try{
        $request->validate([
            "title" => "required",
            "link"  => "required",
        ]);


        $program = Program::findOrFail($id);
        $program->title = $request->title;
        $program->link = $request->link;
        $program->programId = $request->programId;

        $result=$program->save();
        if($result){
            return response()->json(["success" => true]);
        }else{
            return response()->json(["success" => false]);
        }
        }catch(Exception $e){
            return response()->json(["success" => false, "error"=> $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try{
            $removed = Program::destroy($id);
            if ($removed) return response()->json(["success" => true]);
            else          return response()->json(["success" => false]);
        }catch(Exception $e){
            return response()->json(["success" => false, "error"=> $e->getMessage()]);
        }
    }
}
