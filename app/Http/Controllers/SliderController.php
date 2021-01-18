<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Sliders/Index', [
            'sliders'=> Slider::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Sliders/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'short_desc'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);

        Slider::create([
            'title'=> $request->title,
            'short_desc'=> $request->short_desc,
            'description'=> $request->description,
            'image'=> $request->image,
            'is_active'=> $request->is_active
        ]);

        return response()->json([
            'message'=> 'Запись сохранена!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Sliders/Edit', [
            'slider_data'=> Slider::find($id)
        ]);
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
        $this->validate($request, [
            'title'=> 'required',
            'short_desc'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);

        Slider::find($id)->update([
            'title'=> $request->title,
            'short_desc'=> $request->short_desc,
            'description'=> $request->description,
            'image'=> $request->image,
            'is_active'=> $request->is_active
        ]);

        return response()->json([
            'message' => 'Запись изменена!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->delete();
        return response()->json([
            'message'=> 'Запись удалён!'
        ]);
    }
}
