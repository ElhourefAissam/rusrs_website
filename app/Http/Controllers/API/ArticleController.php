<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Photo;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        if(request('q') != null){
            return Article::with('photos')->where('title','like','%'.request('q').'%')->orderBy('created_at','desc')->paginate(6);
        }
        return Article::with('photos')->orderBy('created_at','desc')->paginate(6);
        // return Article::with('photos')->get();
    }

    public function store(Request $request)
    {
        $imageController = new ImageController;

        $request->validate([
            'title' => 'required',
            'article_body' => 'required',
            'author' => 'required',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'article_body' => $request->article_body,
            'author' => $request->author,
        ]);

        $photos = explode(",",$request->get('photo'));

        foreach($photos as $photo){
            Photo::created([
                'imageable_id' => $article->id,
                'imageable_type' => 'App\Article',
                'filename' => $photo
            ]);
        }


        if($article)
            return ["success"=>"Article created"];
        else
            return ["error"=>"Article not created"];
    }

    public function show($id)
    {
        return Article::findOrFail($id);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'article_body' => 'required',
            'author' => 'required',
        ]);

        $event = Article::findOrFail($id);
        $event->title = $request->title;
        $event->article_body  = $request->article_body ;
        $event->author = $request->author;

        $result=$event->save();
        if($result){
            return ["result" => "Updated "];
        }else{
            return ["result"=>"not updated"];
        }
    }

    public function destroy($id)
    {
        Article::destroy($id);
    }
}
