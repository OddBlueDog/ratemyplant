<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plant.create');
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
            'image' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $plant = new Plant();

        $plant->title = request('title');
        $plant->description = request('description');
        $plant->user_id = auth()->id();
        $plant->filename = Storage::putFile('/images', $request->file('image'));
        $plant->save();


        return redirect()->action(
            'PlantController@show',
            ['id' => $plant->id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show(plant $plant)
    {
        return view('plant.show', ['plant' => $plant, 'user' => $plant->user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit(plant $plant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plant $plant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(plant $plant)
    {
        //
    }
}
