<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function index(){
        return view('account.payments.index',[
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
