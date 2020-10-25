<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticaleController extends Controller
{
    public function index()
    {
        return Article::orderBy('created_at','asc')->paginate(9);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artical_body' => 'required',
            'author' => 'required',
        ]);

        Article::create([
            'title' => $request->title,
            'artical_body' => $request->artical_body,
            'author' => $request->author,
        ]);
    }

    public function show($id)
    {
        return Article::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'artical_body' => 'required',
            'author' => 'required',
        ]);

        $event = Article::findOrFail($request->$id);
        $event->title = $request->title;
        $event->artical_body = $request->artical_body;
        $event->author = $request->author;

        return $request->method();
    }

    public function destroy($id)
    {
        Article::destroy($id);
    }
}
