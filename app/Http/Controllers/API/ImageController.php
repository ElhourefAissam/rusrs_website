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


    public function store(Request $request, $model=null)
    {

        if($request->hasFile('files'))
        {

            $images = [];
            foreach($request->file('files') as $file)
            {
                $filename= "/images/".time()."_".$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $images[]= $filename;
            }

            foreach($images as $image){
                Photo::created([
                    'imageable_id' => $model,
                    'imageable_type' => 'App\\Event',
                    'filename' => $image
                ]);
            }


            return response()->json(["sucess"=>"images were uploaded" ]);
        }
        return response()->json(["error"=> "Error on uploading"]);

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
}
