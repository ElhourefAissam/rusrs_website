<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Exception;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isInstanceOf;

class ImageController extends Controller
{

    public function index()
    {

    }


    public function store(Request $request, $Model)
    {

        $images = [];
        foreach($request->file('files') as $file)
        {
            $filename= "/images/".time()."_".$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $images[]= $filename;
        }

        foreach($images as $image){
            $photo = new Photo ;
            $photo->filename= $image;
            $Model->photos()->save($photo);
        }

         return response()->json(["sucess"=>"images were uploaded" ]);

    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function ModelIdFinder(Request $request){
        $model=null;
        $data = $request->all("modelId");
        if($data){
            $ev=[];
            foreach($data as $e){
                $ev[]=$e;
            }

            $array = json_encode($ev[0]);
            $model = json_decode($array);
        }
        return $model;
    }
}
