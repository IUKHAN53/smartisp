<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        return view('hrm.position.index')->with([
            'positions' => Position::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $id = $request->pos_id;

        if($name){
            Position::updateOrCreate(['id'=>$id],['name'=>$name]);
        }else{
            toastr()->info("Please Put some name for the position");
        }
        return redirect()->back();
    }

    public function show(Position $position)
    {
        //
    }

    public function edit(Position $position)
    {
        //
    }

    public function update(Request $request, Position $position)
    {
        //
    }

    public function destroy(Position $position)
    {
        $position->delete();
    }
}
