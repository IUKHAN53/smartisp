<?php

namespace App\Http\Controllers;

use App\CustomClasses\Synchronize;
use App\Mikrotik;
use App\Optical;
use App\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use RouterOS\Client;
use RouterOS\Config;
use Illuminate\Support\Facades\Artisan;
use Yajra\DataTables\DataTables;


class ExtraController extends Controller
{


    public function getDHCP()
    {
        if (isset(session('active')->identity)) {
            $mkt = session('active');
        } else {
            dd('no default mkt');
        };
        $config = (new Config())
            ->set('timeout', 1)
            ->set('host', $mkt->host)
            ->set('user', $mkt->username)
            ->set('pass', $mkt->password)
            ->set('port', (int)$mkt->port);
        $client = new Client($config);
        $response = $client->qr('/ip/dhcp-server/lease/print');
        return view('dhcp.index')->with('dhcp', $response);
    }

    public function setActive(Request $request)
    {
        $mkt = Mikrotik::findOrFail($request['id']);
        $session = $request->session();
        $session->put('active', $mkt);
        ob_clean();
        return response()->json(['success' => "Set new Mikrotik Succesfully"]);
    }

    public function sync(Request $request, $name)
    {
        if (isset($name)) {
            Synchronize::connect();
            if ($name == 'all') {
                Synchronize::all();
                return redirect('/sync')->with('success', 'Synced Everything Succesfully');
            } elseif ($name == 'pool') {
                Synchronize::sync_pool();
                return redirect('/sync')->with('success', 'Synced Pool Succesfully');
            } elseif ($name == 'hotspot') {
                Synchronize::sync_hotspot();
                return redirect('/sync')->with('success', 'Synced Hotspot Succesfully');
            } elseif ($name == 'hotspotprofiles') {
                Synchronize::sync_hotspot_profile();
                return redirect('/sync')->with('success', 'Synced Hotspot Profiles Succesfully');
            } elseif ($name == 'hotspotusers') {
                Synchronize::sync_hotspot_user();
                return redirect('/sync')->with('success', 'Synced Hotspot Users Succesfully');
            } elseif ($name == 'queues') {
                Synchronize::sync_queues();
                return redirect('/sync')->with('success', 'Synced Queues Succesfully');
            } elseif ($name == 'queuetypes') {
                Synchronize::sync_queue_types();
                return redirect('/sync')->with('success', 'Synced Queue Types Succesfully');
            } elseif ($name == 'ipaddresses') {
                Synchronize::sync_ipaddress();
                return redirect('/sync')->with('success', 'Synced IP Addresses Succesfully');
            } elseif ($name == 'interfaces') {
                Synchronize::sync_interfaces();
                return redirect('/sync')->with('success', 'Synced Interfaces Succesfully');
            }
        } else {
            return abort(404);
        }
    }

    public function syncget()
    {
        return view('sync.index');
    }

    public function migrate()
    {
        Artisan::call('migrate');
    }

    public function getprofiles(Request $request)
    {
        $mkt = Auth::user()->mikrotiks()->findOrFail($request['id']);
        $profiles = $mkt->packages;
        return response($profiles);
    }

    public function servers(Request $request)
    {
        $data = collect();
        $servers = Server::all();
        foreach ($servers as $server) {
            exec("ping -n 3 $server->ip", $output, $status);
            if ($status == 0)
                $s = 'online';
            else
                $s = 'offline';
            $data->push([
                'server' => $server,
                'status' => $s
            ]);

        }
        return view('network.server.index',[
            'data' => $data
        ]);
    }
    public function createserver(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'name' => 'required',
                'ip' => 'required|ipv4'
            ]);
        Server::create($data);
        return redirect('/server')->with('success','added succesfully');
        } else {
            return view('network.server.create');
        }

    }
    public  function getpon(Request $request){
        $olt = Optical::all()->find($request['olt']);
        $data = $olt->totalpon;
        return response((int)$data);
    }
}
