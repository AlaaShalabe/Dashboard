<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Topic;
use Illuminate\Http\Request;

class NewsController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['index','store']]);
         $this->middleware('permission:news-create', ['only' => ['create','store']]);
         $this->middleware('permission:news-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:news-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::orderBy('id', 'DESC')->paginate(5);

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        return view('news.create', ['topics' => $topics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'topic_id' => 'required|numeric|exists:topics,id',
            'content' => 'required|string',
        ]);
        //dd($request);
        $news = News::create([
            'title' => $request->title,
            'topic_id' => $request->topic_id,
            'content' => $request->content
        ]);
        // if ($request->hasFile('image')) {
        //     $news->addMediaFromRequest('image')->toMediaCollection('images');
        // }
        return redirect()->route('news.index')->with('success', 'News created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $topics = Topic::all();
        return view('news.edit', compact('news'), ['topics' => $topics])
            ->with('success', 'News updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'string',
            'topic_id' => 'numeric|exists:topics,id',
            'content' => 'string',
        ]);

        $news->title = $request->title;
        $news->topic_id = $request->topic_id;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $news->clearMediaCollection('images');
            $news->addMediaFromRequest('image')->toMediaCollection('images');
        }

        $news->save();

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->back();
    }
}
