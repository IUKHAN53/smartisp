<?php

namespace App\Http\Controllers;

use App\Optical;
use Illuminate\Http\Request;

class OpticalController extends Controller
{

    public function index()
    {

        return view('network.optical.index', [
            'opticals' => Optical::all(),
            'i' => 1,
        ]);
    }


    public function create()
    {
        return view('network.optical.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'totalpon' => 'required',
            'onuperpon' => 'required',
            'address' => 'required',
        ]);
        Optical::create($data);
        return redirect('/optical')->with('success','ONT Added Succesfully');
    }
    public function show(Optical $optical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Optical $optical
     * @return \Illuminate\Http\Response
     */
    public function edit(Optical $optical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Optical $optical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Optical $optical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Optical $optical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Optical $optical)
    {
        //
    }
}
