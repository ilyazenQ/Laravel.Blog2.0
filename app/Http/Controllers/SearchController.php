<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $search = $request->search;
        $articles = Article::findBySearch($search);
        return view('app.search.searchResult',compact('articles'));

    }
}
