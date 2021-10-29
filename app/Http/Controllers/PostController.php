<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $article = Article::add($request->all());
        $article->setNewTags($request->get('tags'));
        $article->setNewCategories($request->get('categories'));
        $article->generateNewState();
        $article->setProductionState($request->get('production'));
        $article->setRecommendState($request->get('recommend'));
        $article->uploadImage($request->file('img'));
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::findBySlug($slug);
        return view('app.admin.post-edit',compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $article = Article::find($id);
        $article->edit($request->all());
        $article->setProductionState($request->get('production'));
        $article->setRecommendState($request->get('recommend'));
        $article->uploadImage($request->file('img'));
        $article->setTags($request->get('tags'));
        $article->setCategories($request->get('categories'));
        return redirect()->route('admin.index');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->remove();
        return redirect()->route('admin.index');
    }

}
