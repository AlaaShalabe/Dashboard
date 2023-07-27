<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::all();
        $users = User::all();
        $news = News::all();
        return view('pages.dashboard', ['articles' => $articles, 'users' => $users, 'news' => $news]);
    }
}
