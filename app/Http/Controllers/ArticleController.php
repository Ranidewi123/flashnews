<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index( )
    {
        $title = 'All Article';
        if (request('category')){
            $category   = Category::firstWhere('id', request('category'));
            $title      = $category->name.' Articles';
        }

        if (request('user')){
            $user       = User::firstWhere('id', request('user'));
            $title      = 'Articles by '.$user->name;
        }

        $data['title'] = $title;
        $data['articles'] = Article::latest()->filter(request(['search', 'category','user']))->paginate(6)->withQueryString();
        return view('article.articles', $data);
    }

    public function show(Article $article){
        $data['article'] = $article;
        $data['title'] = $article->title;
        return view('article.article', $data);
    }
}
