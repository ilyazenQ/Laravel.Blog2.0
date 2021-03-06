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
        $articles = Article::productionPaginate(10);
        return view('app.article.index',compact('articles'));
    }
    public function show($slug) {
        $article = Article::findBySlug($slug);
        $article->incrementViews();
        $seo = $article->seo;
        $recommendArticles = Article::findRecommend(3);
        return view('app.article.show',compact('article','recommendArticles','seo'));
    }
   // public function allByTag(Tag $tag) {
   //     $articles = $tag->articles()->findByTag();
   //     $searchingTagLabel = $tag->label;
   //     return view('app.article.byTag',compact('articles','searchingTagLabel'));
   // }
    public function allByTag($slug) {
        $articles = Article::findByTag($slug);
        $searchingTagLabel = Tag::where('slug',$slug)->firstOrFail()->label;
        return view('app.article.byTag',compact('articles','searchingTagLabel'));
    }
  //  public function allByCategory(Category $category) {
   //     $articles = $category->articles()->findByCategory();
   //    $searchingCategoryLabel = $category->label;
  //      return view('app.article.byCategory',compact('articles','searchingCategoryLabel'));
 //}
   public function allByCategory($slug) {
     $articles = Article::findByCategory($slug);
     $searchingCategoryLabel = Category::where('slug',$slug)->firstOrFail()->label;
     return view('app.article.byCategory',compact('articles','searchingCategoryLabel'));
   }

    
}
