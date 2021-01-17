<?php

namespace App\Http\Controllers;

use App\Optical;
use App\Splitter;
use Illuminate\Http\Request;

class SplitterController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('network.splitter.create',[
            'olt' => Optical::all()
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Splitter $splitter)
    {
        //
    }

    public function edit(Splitter $splitter)
    {
        //
    }

    public function update(Request $request, Splitter $splitter)
    {
        //
    }

    public function destroy(Splitter $splitter)
    {
        //
    }
}
