<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:news-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:news-edit', ['only' => ['edit', 'update']]);
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
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'topic_id' => 'required|numeric|exists:topics,id',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
        ]);
        //dd($request);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('images/news', $imageName, 'public');
        }
        $news = News::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'topic_id' => $request->topic_id,
            'content_en' => $request->content_en,
            'content_ar' => $request->content_ar,
            'image' => $imageName
        ]);

        return redirect()->route('news.index')->with('status', 'News created successfully');
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
        return view('news.edit', compact('news'), ['topics' => $topics]);
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
            'title_en' => 'string',
            'title_ar' => 'string',
            'content_en' => 'string',
            'content_ar' => 'string',
            'topic_id' => 'numeric|exists:topics,id',

        ]);
        $news->title_en = $request->title_en;
        $news->title_ar = $request->title_ar;
        $news->content_en = $request->content_en;
        $news->content_ar = $request->content_ar;
        $news->topic_id = $request->topic_id;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            Storage::disk('public')->delete('images/' . $news->image);
            $newImage = $request->file('image');
            $newImageName = time() . '_' . $newImage->getClientOriginalName();
            $newImage->storeAs('images/news', $newImageName, 'public');
            $news->image = $newImageName;
        }

        $news->save();

        return redirect()->route('news.index')->with('status', 'News updated successfully');
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
        return redirect()->route('news.index')->with('status', 'News deleted successfully');
    }
}
