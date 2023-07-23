<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        if ($news->isEmpty()) {
            return response()->json(['message' => 'No news', 'news' => []]);
        }

        return response()->json([
            'news' =>  $news
        ]);
    }
}
