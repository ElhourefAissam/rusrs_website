<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Photo;
use Exception;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        if (request('q') != null) {
            return Article::with('photos')
                    ->where('title', 'like', '%' . request('q') . '%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);
        }

        return Article::with('photos')
               ->orderBy('created_at', 'desc')
               ->paginate(6);
    }

    public function store(Request $request)
    {
        try{
            if (!$request->hasFile("files")) {
                $request->validate([
                    'title'        => 'required',
                    'article_body' => 'required',
                ]);

                $article = Article::create([
                    'title'        => $request->title,
                    'article_body' => $request->article_body,
                    'author'       => $request->author,
                ]);
                //this one is very important
                if ($article)
                     return  response()->json(["id"      => $article->id, "success" => true]);
                else return  response()->json(["success" => false]);
            } else {

                $imageController = new ImageController;
                $id              = $imageController->ModelIdFinder($request);
                $eventModel      = Article::find($id);

                return $imageController->store($request, $eventModel);
            }
        }catch(Exception $e){
            return  response()->json(["success" => false, "error"=> $e->getMessage()]);
        }
    }

    public function show($id)
    {
        return Article::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'        => 'required',
            'article_body' => 'required',
        ]);

        $event = Article::findOrFail($id);
        $event->title         = $request->title;
        $event->article_body  = $request->article_body;
        $event->author        = $request->author;

        $result = $event->save();

        if ($result) {
            return response()->json(["success" => true]);
        } else {
            return response()->json(["success" => false]);
        }
    }

    public function destroy($id)
    {
        $article = Article::destroy($id);
        if ($article) return response()->json(["success" => true]);
        else          return response()->json(["success" => false]);
    }
}
