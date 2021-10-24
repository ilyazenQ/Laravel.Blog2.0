<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
       // var_dump(request());
    }
    public function index() {
        $articles = Article::allPaginate(10);
        return view('app.article.index',compact('articles'));
    }
    public function show($slug) {
        $article = Article::findBySlug($slug);
        return view('app.article.show',compact('article'));
    }
    public function allByTag(Tag $tag) {
        $articles = $tag->articles()->findByTag();
        $searchingTagLabel = $tag->label;
        return view('app.article.byTag',compact('articles','searchingTagLabel'));
    }
    public function allByCategory(Category $category) {
        $articles = $category->articles()->findByCategory();
        $searchingCategoryLabel = $category->label;
        return view('app.article.byCategory',compact('articles','searchingCategoryLabel'));
    }
}
