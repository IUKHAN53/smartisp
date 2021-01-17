<?php

namespace App\Http\Controllers;

use App\CustomClasses\Synchronize;
use App\Hotspot;
use Illuminate\Http\Request;
use App\HotspotProfile;
use App\HotspotUser;
use App\Package;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Query;
use Illuminate\Support\Facades\Auth;

class HotspotUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('hotspot.user.index')->with(
            'user', HotspotUser::all()
        );
    }

    public function create()
    {
        return view('hotspot.user.create', [
            'servers' => Hotspot::all(),
            'profiles' => HotspotProfile::all()
        ]);
    }

    public function createBatch(Request $request)
    {
        if ($request->isMethod('post')) {
            $qty = ($request['qty']);
            $server = ($request['server']);
            $user = ($request['user']);
            $userl = ($request['userl']);
            $prefix = ($request['prefix']);
            $char = ($request['char']);
            $profile = ($request['profile']);
            $timelimit = ($request['timelimit']);
            $datalimit = ($request['datalimit']);
            $adcomment = ($request['adcomment']);
            $mbgb = ($request['mbgb']);
            if ($timelimit == "") {
                $timelimit = "0";
            }
            if ($datalimit == "") {
                $datalimit = "0";
            } else {
                $datalimit = $datalimit * $mbgb;
            }
            if ($adcomment == "") {
                $adcomment = "";
            }
            if(session()->has('active')){
            $mkt = session('active');}
            else{dd('no default mkt');};
            $config = (new Config())
                ->set('timeout', 1)
                ->set('host', $mkt->host)
                ->set('user', $mkt->username)
                ->set('pass', $mkt->password)
                ->set('port', (int)$mkt->port);
            $client = new Client($config);

            $a = array("1" => "", "", 1, 2, 2, 3, 3, 4);
            if ($user == "up") {
                for ($i = 1; $i <= $qty; $i++) {
                    if ($char == "lower") {
                        $u[$i] = $this->generateRandomString($userl, 'l');
                    } elseif ($char == "upper") {
                        $u[$i] = $this->generateRandomString($userl, 'u');
                    } elseif ($char == "upplow") {
                        $u[$i] = $this->generateRandomString($userl, 'ul');
                    } elseif ($char == "mix") {
                        $u[$i] = $this->generateRandomString($userl, 'nl');
                    } elseif ($char == "mix1") {
                        $u[$i] = $this->generateRandomString($userl, 'nu');
                    } elseif ($char == "mix2") {
                        $u[$i] = $this->generateRandomString($userl, 'nul');
                    }
                    $p[$i] = $this->generateRandomString($userl, 'n');
                    $u[$i] = $prefix . $u[$i];
                }
                for ($i = 1; $i <= $qty; $i++) {
                    $query = new Query('/ip/hotspot/user/add');
                    $query->equal('server', $server);
                    $query->equal('name', $u[$i]);
                    $query->equal('password', $p[$i]);
                    $query->equal('profile', $profile);
                    $query->equal('limit-uptime', $timelimit);
                    $query->equal('limit-bytes-total', $datalimit);
                    $query->equal('comment', $adcomment);
                    $response = $client->query($query)->read();
//                    dd($query);
                }
            }
            if ($user == "vc") {
                $shuf = ($userl - $a[$userl]);
                for ($i = 1; $i <= $qty; $i++) {
                    if ($char == "lower") {
                        $u[$i] = $this->generateRandomString($shuf, 'l');
                    } elseif ($char == "upper") {
                        $u[$i] = $this->generateRandomString($shuf, 'u');
                    } elseif ($char == "upplow") {
                        $u[$i] = $this->generateRandomString($shuf, 'ul');
                    } elseif ($char == "num") {
                        $u[$i] = $this->generateRandomString($userl, 'n');
                    } elseif ($char == "mix") {
                        $u[$i] = $this->generateRandomString($userl, 'nl');
                    } elseif ($char == "mix1") {
                        $u[$i] = $this->generateRandomString($userl, 'nu');
                    } elseif ($char == "mix2") {
                        $u[$i] = $this->generateRandomString($userl, 'nul');
                    }
                    $u[$i] = $prefix . $u[$i];
                }

                for ($i = 1; $i <= $qty; $i++) {
                    $query = new Query('/ip/hotspot/user/add');
                    $query->equal('server', $server);
                    $query->equal('name', $u[$i]);
                    $query->equal('password', $u[$i]);
                    $query->equal('profile', $profile);
                    $query->equal('limit-uptime', $timelimit);
                    $query->equal('limit-bytes-total', $datalimit);
                    $query->equal('comment', $adcomment);
                    $response = $client->query($query)->read();
                }
            }
            Synchronize::connect();
            Synchronize::sync_hotspot_user();
            return redirect('/hotspotuser')->with('success','Batch Users added Succesfully');
        } else {
            return view('hotspot.user.batch_create', [
                'servers' => Hotspot::all(),
                'profiles' => HotspotProfile::all()
            ]);
        }


    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'server' => 'required',
            'password' => 'required',
            'profile' => 'required',
            'datalimit' => 'required',
        ]);
        $data = $this->convertToBytes($request->get('datalimit') . $request->get('size'));

        $hotspot = Hotspot::findOrFail($request->get('server'));
        $hotspot->hotspotuser()->create([
            'name' => $request->get('name'),
            'password' => $request->get('password'),
            'profile' => $request->get('profile'),
            'limit-uptime' => $request->get('timelimit'),
            'limit-bytes-total' => $request->get('datalimit') . $request->get('size'),
        ]);
        if(session()->has('active')){
        $mkt = session('active');}
        else{dd('no default mkt');};
        $config = (new Config())
            ->set('timeout', 1)
            ->set('host', $mkt->host)
            ->set('user', $mkt->username)
            ->set('pass', $mkt->password)
            ->set('port', (int)$mkt->port);
        $client = new Client($config);
        $query = new Query('/ip/hotspot/user/add');
        $query->equal('server', $hotspot->name);
        $query->equal('name', $request->get('name'));
        $query->equal('password', $request->get('password'));
        $query->equal('profile', $request->get('profile'));
        $query->equal('limit-uptime', $request->get('timelimit'));
        $query->equal('limit-bytes-total', (int)$data);
        $query->equal('comment', $request->get('comment'));
        $response = $client->query($query)->read();
        Synchronize::connect();
        Synchronize::sync_hotspot_user();
        return redirect('/hotspotuser')->with('success', 'Added Succesfully');
    }

    public function show(HotspotUser $hotspotUser)
    {
        //
    }

    public function edit(HotspotUser $hotspotUser)
    {
        //
    }

    public function update(Request $request, HotspotUser $hotspotUser)
    {
        //
    }

    public function destroy(HotspotUser $hotspotUser)
    {
        //
    }

    public function getHosts(Request $request){
        if(session()->has('active')){
$mkt = session('active');}
else{dd('no default mkt');};
        $config = (new Config())
            ->set('timeout', 1)
            ->set('host', $mkt->host)
            ->set('user', $mkt->username)
            ->set('pass', $mkt->password)
            ->set('port', (int)$mkt->port);
        $client = new Client($config);
        $response = $client->qr('/ip/hotspot/host/print');
        return view('hotspot.user.hosts')->with('hosts',$response);
    }

    public function convertToBytes(string $from): ?int
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $number = substr($from, 0, -2);
        $suffix = strtoupper(substr($from, -2));

        //B or no suffix
        if (is_numeric(substr($suffix, 0, 1))) {
            return preg_replace('/[^\d]/', '', $from);
        }

        $exponent = array_flip($units)[$suffix] ?? null;
        if ($exponent === null) {
            return null;
        }
        return $number * (1024 ** $exponent);
    }

    public function generateRandomString($length = 10, $type)
    {
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '0123456789';
        if ($type = 'l') {
            $characters = $lower;
        } elseif ($type = 'u') {
            $characters = $upper;
        } elseif ($type = 'l') {
            $characters = $lower;
        } elseif ($type = 'ul') {
            $characters = $upper . $lower;
        } elseif ($type = 'n') {
            $characters = $num;
        } elseif ($type = 'nl') {
            $characters = $num . $lower;
        } elseif ($type = 'nu') {
            $characters = $num . $upper;
        } elseif ($type = 'nul') {
            $characters = $num . $upper . $lower;
        }

        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
