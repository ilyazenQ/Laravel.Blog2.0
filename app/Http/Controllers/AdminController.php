<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


class AdminController extends Controller
{
    public function index() {
        $articles = Article::allPaginate(10);
        return view('app.admin.index',compact('articles'));
    }
}
