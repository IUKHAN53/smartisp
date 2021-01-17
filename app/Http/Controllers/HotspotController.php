<?php

namespace App\Http\Controllers;

use App\Hotspot;
use Illuminate\Http\Request;

class HotspotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $hotspots = Hotspot::all();
        return view('hotspot.index')->with('hotspots',$hotspots);
    }

    public function create()
    {
        return view('hotspot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function show(Hotspot $hotspot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotspot $hotspot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotspot $hotspot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotspot  $hotspot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotspot $hotspot)
    {
        //
    }
}
