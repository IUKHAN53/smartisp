<?php

namespace App\Http\Controllers;

use App\Chartofaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yoeunes\Toastr\Facades\Toastr;

class ChartofaccountController extends Controller
{
    public function index()
    {
        return view('account.chartofaccounts.index',[
            'data' => Chartofaccount::all(),
            'i' => 1
        ]);

    }
    public function list()
    {
        return view('account.chartofaccounts.viewall',[
            'data' => DB::table('chartofaccounts')
                ->orderBy('type', 'desc')
                ->get(),
            'i' => 1
        ]);

    }

    public function create()
    {

        return view('account.chartofaccounts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'type' => "required",
        ]);
        try {
            switch ($request['type']) {
                case 'expense':
                    try {
                        $identifier = DB::table('chartofaccounts')
                            ->where('type', 'expense')
                            ->orderBy('identifier', 'desc')
                            ->first()
                            ->identifier;
                    }
                    catch (\Exception $e){
                        $identifier = 1000;
                    }
                    break;
                case 'revenue':
                    try {
                        $identifier = DB::table('chartofaccounts')
                            ->where('type', 'revenue')
                            ->orderBy('identifier', 'desc')
                            ->first()
                            ->identifier;
                    }
                    catch (\Exception $e){
                        $identifier = 2000;
                    }
                    break;
                case 'asset':
                    try {
                        $identifier = DB::table('chartofaccounts')
                            ->where('type', 'asset')
                            ->orderBy('identifier', 'desc')
                            ->first()
                            ->identifier;
                    }
                    catch (\Exception $e){
                        $identifier = 3000;
                    }
                    break;
                case 'liability':
                    try {
                        $identifier = DB::table('chartofaccounts')
                            ->where('type', 'liability')
                            ->orderBy('identifier', 'desc')
                            ->first()
                            ->identifier;
                    }
                    catch (\Exception $e){
                        $identifier = 4000;
                    }
                    break;
                case 'equity':
                    try {
                        $identifier = DB::table('chartofaccounts')
                            ->where('type', 'equity')
                            ->orderBy('identifier', 'desc')
                            ->first()
                            ->identifier;
                    }
                    catch (\Exception $e){
                        $identifier = 5000;
                    }
                    break;
                default:
                    $identifier = 0000;
                    break;
            }
            $chart_of_account = Chartofaccount::create([
                'name' => $request->name,
                'type' => $request->type,
                'identifier' => (int)$identifier + 1,
                'isp_id' => 1
//                'isp_id' => Auth::id()
            ]);
            if ($chart_of_account) {
                Toastr::success('Operation successful', 'Success');
                return redirect('/chartofaccounts');
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Failed');
            return redirect()->back();
        }
    }

    public function show(Chartofaccount $chartofaccount)
    {
        try {
            $chart_of_accounts = $chartofaccount;
            return view('account.chartofaccounts.show', compact('chart_of_account', 'chart_of_accounts'));
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    public function edit(Chartofaccount $chartofaccount)
    {

    }

    public function update(Request $request, Chartofaccount $chartofaccount)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => "required",
            'type' => "required",
        ]);

        try {
            $chart_of_account = Chartofaccount::find($request->id);
            $chart_of_account->head = $request->head;
            $chart_of_account->type = $request->type;
            $result = $chart_of_account->save();
            if ($result) {
                Toastr::success('Operation successful', 'Success');
                return redirect()->back();
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chartofaccount  $chartofaccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chartofaccount $chartofaccount)
    {
        //
    }
}
