<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index() {
        // $articles = Article::with('state','tags')->orderBy('created_at','desc')->take(6)->get();
           $articles = Article::lastLimit(6); // перенесли логику в модель (scopeLastLimit)
           return view('app.home',compact('articles'));
       }
}
