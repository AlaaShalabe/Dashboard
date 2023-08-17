<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{



    function __construct()
    {
        $this->middleware('permission:article-list|article-create|article-edit|article-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:article-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:article-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:article-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(5);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('articles.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $data = $request->validate([
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
        ]);


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('images', $imageName, 'public');
        }

        $article = Article::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'user_id' => auth()->user()->id,
            'content_en' => $request->content_en,
            'content_ar' => $request->content_ar,
            'image' => $imageName
        ]);


        return redirect()->route('articles.index')
            ->with('status', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title_en' => 'string',
            'title_ar' => 'string',
            'content_en' => 'string',
            'content_ar' => 'string',
        ]);

        $article->title_en = $request->title_en;
        $article->title_ar = $request->title_ar;
        $article->content_en = $request->content_en;
        $article->content_ar = $request->content_ar;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            Storage::disk('public')->delete('images/' . $article->image);
            $newImage = $request->file('image');
            $newImageName = time() . '_' . $newImage->getClientOriginalName();
            $newImage->storeAs('images', $newImageName, 'public');
            $article->image = $newImageName;
        }
        $article->save();

        return redirect()->route('articles.index')->with('status', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('status', 'Article deleted successfully');
    }
}
