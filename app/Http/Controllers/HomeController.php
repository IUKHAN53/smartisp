<?php

namespace App\Http\Controllers;

use App\HotspotUser;
use App\Mikrotik;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \RouterOS\Config;
use \RouterOS\Client;
use \RouterOS\Query;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $session = $request->session();
        $session->put('user', Auth::user());
        $user = Auth::user();
        $session->put('mkt', $user->mikrotiks);
        if (isset(session('active')->identity)) {
            $mkt = session('active');
            $config = (new Config())
                ->set('timeout', 1)
                ->set('host', $mkt->host)
                ->set('user', $mkt->username)
                ->set('pass', $mkt->password)
                ->set('port', (int)$mkt->port);
            $client = new Client($config);
            $clock = $client->qr('/system/clock/print');
            $resources = $client->qr('/system/resource/print');
            $routerboard = $client->qr('/system/routerboard/print');

            $query = new Query('/ip/hotspot/user/print');
            $query->equal('count-only', '');
            $response = $client->query($query)->read();
            $count_users = ($response['after'])['ret'];

            $query = new Query('/ip/hotspot/active/print');
            $query->equal('count-only', '');
            $response = $client->query($query)->read();
            $count_active = ($response['after'])['ret'];

            $response = $client->qr('/log/print');
            $c = collect();
            foreach ($response as $item) {
                $t = explode(',', $item['topics']);
                if (in_array('hotspot', $t)) {
                    $user = (explode(':', $item['message']))[1] ?? 'N/A';
                    $mess = (explode(':', $item['message']))[2] ?? 'N/A';
                    $time = $item['time'];
                    $c->push(['time' => $time, 'user' => $user, 'message' => $mess]);
                }
            }
//            Role::create(['name'=>'franchise']);
            return view('dashboard', [
                'clock' => $clock,
                'resources' => $resources,
                'routerboard' => $routerboard,
                'total_users' => $count_users,
                'total_active' => $count_active,
                'log' => $c,
            ]);
        } else {
            return view('dashboard')->with('mkt','none');
        }

    }

    public function traffic_monitor(Request $request)
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
        $query = new Query('/interface/monitor-traffic');
        $query->equal('interface', 'ether1-WAN');
        $query->equal('once', '');
        $getinterfacetraffic = $client->query($query)->read();

        $rows = array();
        $rows2 = array();
        $ftx = $getinterfacetraffic[0]['tx-bits-per-second'];
        $frx = $getinterfacetraffic[0]['rx-bits-per-second'];
        $rows['name'] = 'Tx';
        $rows['data'][] = $ftx;
        $rows2['name'] = 'Rx';
        $rows2['data'][] = $frx;
        $result = array();

        array_push($result, $rows);
        array_push($result, $rows2);
        dd(json_encode($result));
    }
}
