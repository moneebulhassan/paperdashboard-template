<?php

namespace App\Http\Controllers;

use App\Models\Icon;


use Illuminate\Http\Request;

class IconController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icons= Icon::all();
        return  view('pages.icons');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Icon::create($request->all());

        return redirect()->back()->with(['success'=>"Task Performed Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $icon = Icon::findOrFail($id);
        return view('pages.showicons',compact('icon'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $icon=Icon::findOrFail($id)->update($request->all());



        return redirect()->back()->with(['success'=>'Task performed Succesfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Icon::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => "Task Deleted Successfully"]);
    }
}
