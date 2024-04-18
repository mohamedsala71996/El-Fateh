<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('website.articles.index',compact('articles'));
    }
    public function show($id){
        $article=Article::findOrFail($id);
        return view('website.articles.show',compact('article'));
    }


}