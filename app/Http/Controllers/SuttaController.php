<?php

namespace App\Http\Controllers;

use App\Sutta;
use App\Chapter;

use Illuminate\Http\Request;

class SuttaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suttas = Sutta::all();
        return view('sutta.index', compact('suttas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$chapter_select = Chapter::all();
        $chapter_select = Chapter::pluck('title','id')->all();


        return view('sutta.create', compact('chapter_select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Sutta::create($request->all());
        return redirect(route('suttas.index'))->with('success_message', 'Sutta was Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sutta  $sutta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $sutta_show = Sutta::find($id);
        return view('sutta.show', compact('sutta_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sutta  $sutta
     * @return \Illuminate\Http\Response
     */
    public function edit(Sutta $sutta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sutta  $sutta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sutta $sutta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sutta  $sutta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sutta::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Sutta was Delete');
    }
}
