<?php

namespace App\Http\Controllers;

use App\Pool;
use Illuminate\Http\Request;

class PoolController extends Controller
{

    public function index()
    {
        return view('ipaddress.pool.index')->with('pools',Pool::all());
    }
    public function create()
    {
        return view('ipaddress.pool.create');
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
    public function show(Pool $pool)
    {
        //
    }
    public function edit(Pool $pool)
    {
        //
    }
    public function update(Request $request, Pool $pool)
    {
        //
    }
    public function destroy(Pool $pool)
    {
        //
    }
}
