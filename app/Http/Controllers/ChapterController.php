<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;
use Redirect;
class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = Chapter::all();
        return view('chapter.index', compact('chapters'));
        //return "update";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('chapter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chapter = new Chapter;
        $chapter->title = $request->title;
        $chapter->save();
        return Redirect::to("chapters")->withSuccess('Grate! Chapter Name has been inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapter_show = Chapter::find($id);
        return view('chapter.show', compact('chapter_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapter_edit = Chapter::where('id',$id)->first();
        return view('chapter.edit', compact('chapter_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $chapter_update = Chapter::find($id);
        
        $chapter_update->update($request->all());
        return redirect(route('chapters.index'))->with('success_message','Chapter Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Chapter was Delete');
    }
}
