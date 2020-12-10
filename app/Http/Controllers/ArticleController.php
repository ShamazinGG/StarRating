<?php

namespace App\Http\Controllers;

use App\Exceptions\ArticleNotFoundException;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
//use willvincent\Rateable\RateableServiceProvider;
//use Willvincent\Rateable\Rating;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::query()->latest()->paginate(10);

        return view('Articles.index', compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Articles.create');
    }


    public function store(Request $request)
    {

        $article = new Article([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'date' => $request->get('date'),
            'author' => $request->get('author'),
        ]);

        $article->save();

        return redirect(Route('article.index'))->with('success', 'Статья добавлена!');
    }


    public function show($id)
    {
        try {
            $article = (new ArticleService())->findById($id);
        } catch (ArticleNotFoundException $exception) {
            return view('articles.notfound', ['error' => $exception->getMessage()]);
        }

        return view('articles.show', compact('article'));
    }


    public function edit($id)
    {
        try {
            $article = (new ArticleService())->findById($id);
        } catch (ArticleNotFoundException $exception) {
            return view('articles.notfound', ['error' => $exception->getMessage()]);
        }

        //$article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'date' => 'required',
            'author' => 'required'
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->date = $request->get('date');
        $article->author = $request->get('author');

        $article->save();
        return redirect(Route('article.index'))->with('success', 'Статья обновлена!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect(Route('article.index'))->with('success', 'Статья удалена');
    }

    public function rating(Request $request, $id)

    {

        request()->validate(['rate' => 'required']);
        $article = Article::query()->findOrFail($id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $article->ratings()->save($rating);
        return Redirect(Route('article.index'));
    }

}
