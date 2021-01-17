<?php

namespace App\Http\Controllers;

use App\Account;
use App\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class JournalController extends Controller
{
    public function index()
    {
        return view('account.journals.index');

    }

    public function create()
    {
        return view('account.journals.create')->with('account',Account::all());
    }
    public function search(Request $request)
    {
        $from = date($request->from);
        $to = date($request->to);
        if($from>$to){
            Toastr::error('Incorrect Date: \"From\" is greater then \"to\"', 'Failed');
            return redirect('/journals');
        }
        $request->validate([
            'from' => 'required',
            'to' => 'required'
        ]);

        $id = Journal::whereBetween('date',[$from,$to])->get();
        $count = sizeof($id);
        return view('account.journals.index',[
            'entries' => $id,
            'count' => $count,
            'colors' => 1,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'amount' => 'required',
            'account' => 'required',
            'date' => 'required',
            'notes' => 'required',
        ]);
        $types = $request->type;
        $amount = $request->amount;
        $account = $request->account;
        $sum = 0;
        for($i = 0;$i<sizeof($types);$i++){
            if($types[$i] === "c")
                $sum = $sum + $amount[$i];
            else
                $sum = $sum - $amount[$i];
        }
        if ($sum != 0){
            Toastr::error('Total credit and debit mismatch', 'Failed');
            return redirect()->back();
        }
        try {
            $id = DB::table('journals')
                ->orderBy('journal_number', 'desc')
                ->first()
                ->journal_number;
            $id++;
        }
        catch (\Exception $e){
            $id = 1;
        }
        for($i = 0;$i<sizeof($types);$i++){
            Journal::create([
                'journal_number' => $id,
                'account_id' => $account[$i],
                'type' => $types[$i],
                'amount' => $amount[$i],
                'date' => $request->date,
                'notes' => $request->notes,
            ]);
            $acc = Account::findOrFail($account[$i]);
            ($types[$i] == 'c') ? $acc->balance = (int)$acc->balance+(int)$amount[$i] : $acc->balance = (int)$acc->balance-(int)$amount[$i];
            $acc->save();
        }
        Toastr::success('Entry Added Succesfully', 'Success');
        return redirect('/journals');
    }

    public function show(Journal $journal)
    {
        //
    }

    public function edit(Journal $journal)
    {
        //
    }

    public function update(Request $request, Journal $journal)
    {
        //
    }

    public function destroy(Journal $journal)
    {
        //
    }
}
