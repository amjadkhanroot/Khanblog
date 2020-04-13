<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // to prevent Unauthorised access.
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
//      one way to get categories
//      $categories = Category::all();
//      dd($categories);

//      another way to get categories
//      $categories = Category::select('title','id')->get();

//      if you want a simple key, value array use pluck but in return you need to use for loop with keys.
        $categories = Category::pluck('title','id');
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'min:10|max:100|required',
            'content'=> 'min:30|required',
            'categories'=> 'required'
        ]);

        $user = Auth::user();
        $categories = array_values($request->categories);
        $article = $user->articles()->create($request->except('categories'));
        $article->categories()->attach($categories);

//        one way to store MTM relation but the above code more efficient.
//        $data = $user->articles()->create($request->except('categories'));
//        $article = Article::find($data->id);
//        foreach ($request->categories as $category){
//
//            $article->categories()->attach($category);
//        }


        return redirect()->to('/home');

//  we store the article with the following codes but there a best way to do like above one.
//        $article = new Article();
//        $article->title = $request->['title'];
//        $article->content = $request->['content'];
//        $article->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {

        // To prevent unauthorised access
        if(Auth::id() != $article->user_id){
            return abort('401');
        }

        $categories = Category::pluck('title','id');
        $articleCategories = $article->categories()->pluck('id')->toArray();
        return view('articles.edit', compact('categories', 'article', 'articleCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article)
    {
        // validate before submit.
        $request->validate([
            'title'=> 'min:10|max:100|required',
            'content'=> 'min:30|required',
            'categories'=> 'required'
        ]);

        if(Auth::id() != $article->user_id){
            return abort('401');
        }

        $article->update($request->all());
        $article->categories()->sync($request->categories);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        if(Auth::id() != $article->user_id){
            return abort('401');
        }

        $article->delete();
        return redirect()->back();
    }
}
