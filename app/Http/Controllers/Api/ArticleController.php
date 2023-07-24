<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        if ($articles->isEmpty()) {
            return response()->json(['message' => 'No Articles', 'articles' => []]);
        }

        return response()->json([
            'articles' =>  $articles
        ]);
    }
}
