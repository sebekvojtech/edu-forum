<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Topic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|View
     */
    public function index()
    {
return view('home', ['topics' =>Topic::orderBy('id', 'desc')->get(), 'threads' =>Thread::orderBy('id','desc')->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:100', 'unique:topics'],
            'description' => ['required', 'min:2', 'max:300'],


        ]);
        $topic = new Topic();
        $topic->name = $request->input('name');
        $topic->description = $request->input('description');
        $topic->slug = Str::slug($request->input('name'));
        $topic->save();
        return redirect()->to('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Topic $topic)
    {
        return view('topic.show', ['threads'=> $topic->threads()->get(), 'topic' => $topic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:100'],
            'description' => ['required', 'min:2', 'max:300'],


        ]);
        $topic->description = $request->input('description');
        $topic->slug = Str::slug($request->input('name'));
        $topic->name = $request->input('name');
        $topic->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->threads()->delete();
        $topic->delete();
        return redirect()->back();
    }
}
