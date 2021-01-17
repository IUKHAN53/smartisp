<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    function index(){
        return view('account.ledgers.index',[
            'data'=>Account::all()
        ]);
    }
    function search(Request $request){
        $request->validate([
           'account' => 'required'
        ]);
        if ($request->account == 'all'){

        }
        else{

        }
    }
}
