<?php

namespace App\Http\Controllers;

use App\CustomClasses\Synchronize;
use App\Mikrotik;
use App\Queue_type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Query;
use Spatie\Permission\Models\Role;

class MikrotikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $mkt = $user->mikrotiks;
        foreach ($mkt as $mik) {
            exec("ping -n 3 $mik->host", $output, $status);
            if ($status == 0)
                $mik->status = 'online';
            else
                $mik->status = 'offline';
        }
        return view('mikrotik.index', [
            'mikrotik' => $mkt,
        ]);
    }

    public function create()
    {
        return view('mikrotik.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'identity' => 'required',
            'username' => 'required|max:255',
            'password' => 'required',
            'host' => 'required|ipv4|unique:mikrotiks',
            'status' => '',
            'address' => 'required',
            'port' => '',
            'sitename' => 'required',
        ]);
        $config = (new Config())
            ->set('timeout', 1)
            ->set('host', $request->get('host'))
            ->set('user', $request->get('username'))
            ->set('pass', $request->get('password'))
            ->set('port', (int)$request->get('port') ?? 8728);
        try {
            $client = new Client($config);
            $validatedData['status'] = 'true';
            $mkt = Auth::user()->mikrotiks()->create($validatedData);
            $session = $request->session();
            $session->put('active', $mkt);
            Synchronize::connect();
            Synchronize::all();
            return redirect('/mikrotik')->with('success', 'Added Succesfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function test()

    {
//        dd(session('active'));
//        $mkt = session('active');
//        $config = (new Config())
//            ->set('timeout', 1)
//            ->set('host', '103.136.205.238')
//            ->set('user', 'irfan')
//            ->set('pass', 'irfan')
//            ->set('port', 8728);
//        $client = new Client($config);
//        $response = $client->qr('/ip/hotspot/print');
//        dd($response);
//        Role::create(['name'=>'franchise']);
    }

    public function show(Mikrotik $mikrotik)
    {

    }

    public function edit(Mikrotik $mikrotik)
    {
        return view('mikrotik.edit', compact('mikrotik'));
    }

    public function update(Request $request, Mikrotik $mikrotik)
    {
        $validatedData = $request->validate([
            'host' => 'required',
            'username' => 'required',
            'password' => 'required',
            'port' => 'required'
        ]);
        $config = (new Config())
            ->set('timeout', 1)
            ->set('host', $request->get('host'))
            ->set('user', $request->get('username'))
            ->set('pass', $request->get('password'))
            ->set('port', (int)$request->get('port'));
        try {
            $client = new Client($config);
            $mikrotik->host = $request->get('host');
            $mikrotik->username = $request->get('username');
            $mikrotik->password = $request->get('password');
            $mikrotik->port = $request->get('port');
            $mikrotik->save();
            return redirect('/mikrotik')->with('success', 'Mikrtotik Updated!');
        } catch (\Exception $e) {
            return redirect('/mikrotik')->with('success', $e->getMessage());
        }
    }

    public function destroy(Mikrotik $mikrotik)
    {
        try {
            $mikrotik->delete();
        } catch (\Exception $e) {
            return redirect('/mikrotik', with('failed', 'Failed with error! ' . $e));
        }
        return redirect('/mikrotik')->with('success', 'MikroTik Deleted Succesfully!');
    }
}
