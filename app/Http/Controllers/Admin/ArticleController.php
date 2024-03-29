<?php

namespace App\Http\Controllers\Admin; // era "App\Http\Controllers"
use App\Http\Controllers\Controller; // Controller di base da importare


use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Author;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

        $articles = Article::all();

        return view("admin.articles.index", compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $authors = Author::all();
        return view("admin.articles.create", compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        $newArticle = new Article();
        $newArticle->fill($validated);
        $newArticle->save();

        if ($request->authors) {
            $newArticle->authors()->attach($request->authors);
        }

        return redirect()->route("admin.articles.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view("admin.articles.show", compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $authors = Author::all();
        return view("admin.articles.edit", compact("article", 'authors'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validated = $request->validated();

        $article->fill($validated);
        $article->update();

        if ($request->authors) {
            $article->authors()->attach($request->authors);
        }


        return redirect()->route("admin.articles.index");
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index');
    }
}
