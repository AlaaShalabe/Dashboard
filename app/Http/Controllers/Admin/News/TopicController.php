<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:topics-list|topics-create|topics-edit|topics-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:topics-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:topics-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:topics-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topics()
    {
        $topics = Topic::all();
        return view('topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
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
            'name_en' => 'required|string|unique:topics,name_en',
            'name_ar' => 'required|string|unique:topics,name_ar'
        ]);
        //   dd($request);

        $topic = Topic::create($data);
        return redirect()->route('topics.index')->with('status', 'Topic created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        return view('topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'name_en' => 'string',
            'name_ar' => 'string',

        ]);
        $topic->name_en = $request->input('name_en');
        $topic->name_ar = $request->input('name_ar');

        $topic->save();
        return redirect()->route('topics.index')->with('status', 'Topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect()->route('topics.index')->with('status', 'Topic deleted successfully');
    }
}
