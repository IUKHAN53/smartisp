<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $zone = Zone::all();
        return view('zone.index',[
            'zones' => $zone
        ]);
    }
    public function create()
    {
        return view('zone.create');
    }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required',
            'abbr'=>'required',
            'area_owner'=>'required',
            'employee'=>'required'
        ]);
        $zone = new Zone($validatedData);
        if($zone->save())
            return redirect('/zone')->with('success','Added New Zone Succesfully');
        else
            return redirect('/zone')->with('Failed','An error Occured');
    }

    public function show(Zone $zone)
    {

    }
    public function edit(Zone $zone)
    {
        //
    }

    public function update(Request $request, Zone $zone)
    {
        //
    }

    public function destroy(Zone $zone)
    {
        try {
            $zone->delete();
        } catch (\Exception $e) {
            return redirect('/zone',with('failed', 'Failed with error! '.$e));
        }
        return redirect('/zone')->with('success', 'Zone Deleted Succesfully!');
    }
}
