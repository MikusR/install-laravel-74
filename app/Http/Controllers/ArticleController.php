<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('articles.index', ['articles' => Article::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request): RedirectResponse
    {
//        $article = (new Article)->fill([
//            'title' => $request->title,
//            'short_description' => $request->short_description,
//            'description' => $request->description,
//            'image' => $request->get('image'),
//        ]);
        $article = (new Article)->fill($request->all());
        $article->save();
        return redirect()->route('articles.index')->with('success', 'Article has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article): View
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article): View
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
//
        $article->update($request->all());

        return redirect()->route('articles.show', $article)->with('success', 'Article has been edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article has been deleted successfully');
    }
}
