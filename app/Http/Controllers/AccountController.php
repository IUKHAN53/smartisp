<?php

namespace App\Http\Controllers;

use App\Account;
use App\Chartofaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yoeunes\Toastr\Facades\Toastr;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.accounts.index',[
            'i' => 1,
            'accounts' => Account::all()
        ]);
    }

    public function create()
    {
        return view('account.accounts.create',[
            'data' => Chartofaccount::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'type' => "required",
        ]);
        try{
            $account = Account::create([
                'name' => $request->name,
                'chartofaccounts_id' => $request->type,
            ]);
            if ($account) {
                Toastr::success('Operation successful', 'Success');
                return redirect('/accounts');
            } else {
                Toastr::error('Operation Failed', 'Failed');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Failed');
            return redirect()->back();
        }

    }

    public function show(Account $account)
    {

    }

    public function edit(Account $account)
    {

    }

    public function update(Request $request, Account $account)
    {

    }

    public function destroy(Account $account)
    {

    }
}
