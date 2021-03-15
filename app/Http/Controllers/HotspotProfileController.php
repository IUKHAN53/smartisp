<?php

namespace App\Http\Controllers;

use App\CustomClasses\Synchronize;
use App\HotspotProfile;
use App\Pool;
use App\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Query;

class HotspotProfileController extends Controller
{

    public function index()
    {
        return view('hotspot.profile.index')->with('profiles',HotspotProfile::all());
    }
    public function create()
    {
        return view('hotspot.profile.create',[
            'pools' => Pool::all(),
            'queues' => Queue::all(),
        ]);
    }
    public function store(Request $request)
    {
        if (isset($request['name'])) {
            $name = (preg_replace('/\s+/', '-',$request['name']));
            $sharedusers = ($request['sharedusers']);
            $ratelimit = ($request['ratelimit']);
            $expmode = ($request['expmode']);
            $validity = ($request['validity']);
            $graceperiod = ($request['graceperiod']);
            $getprice = ($request['price']);
            $getsprice = ($request['sprice']);
            $addrpool = ($request['ppool']);
            if ($getprice == "") {
                $price = "0";
            } else {
                $price = $getprice;
            }
            if ($getsprice == "") {
                $sprice = "0";
            } else {
                $sprice = $getsprice;
            }
            $getlock = ($request['lockunlock']);
            if ($getlock == 'Enable') {
                $lock = '; [:local mac $"mac-address"; /ip hotspot user set mac-address=$mac [findOrFail where name=$user]]';
            } else {
                $lock = "";
            }

            $randstarttime = "0".rand(1,5).":".rand(10,59).":".rand(10,59);
            $randinterval = "00:02:".rand(10,59);

            $parent = ($request['parent']);

            $record = '; :local mac $"mac-address"; :local time [/system clock get time ]; /system script add name="$date-|-$time-|-$user-|-'.$price.'-|-$address-|-$mac-|-' . $validity . '-|-'.$name.'-|-$comment" owner="$month$year" source=$date comment=mikhmon';

            $onlogin = ':put (",'.$expmode.',' . $price . ',' . $validity . ','.$sprice.',,' . $getlock . ',"); {:local date [ /system clock get date ];:local year [ :pick $date 7 11 ];:local month [ :pick $date 0 3 ];:local comment [ /ip hotspot user get [/ip hotspot user findOrFail where name="$user"] comment]; :local ucode [:pic $comment 0 2]; :if ($ucode = "vc" or $ucode = "up" or $comment = "") do={ /sys sch add name="$user" disable=no start-date=$date interval="' . $validity . '"; :delay 2s; :local exp [ /sys sch get [ /sys sch findOrFail where name="$user" ] next-run]; :local getxp [len $exp]; :if ($getxp = 15) do={ :local d [:pic $exp 0 6]; :local t [:pic $exp 7 16]; :local s ("/"); :local exp ("$d$s$year $t"); /ip hotspot user set comment=$exp [findOrFail where name="$user"];}; :if ($getxp = 8) do={ /ip hotspot user set comment="$date $exp" [findOrFail where name="$user"];}; :if ($getxp > 15) do={ /ip hotspot user set comment=$exp [findOrFail where name="$user"];}; /sys sch remove [findOrFail where name="$user"]';


            if ($expmode == "rem") {
                $onlogin = $onlogin . $lock . "}}";
                $mode = "remove";
            } elseif ($expmode == "ntf") {
                $onlogin = $onlogin . $lock . "}}";
                $mode = "set limit-uptime=1s";
            } elseif ($expmode == "remc") {
                $onlogin = $onlogin . $record . $lock . "}}";
                $mode = "remove";
            } elseif ($expmode == "ntfc") {
                $onlogin = $onlogin . $record . $lock . "}}";
                $mode = "set limit-uptime=1s";
            } elseif ($expmode == "0" && $price != "") {
                $onlogin = ':put (",,' . $price . ',,,noexp,' . $getlock . ',")' . $lock;
            } else {
                $onlogin = "";
            }
            $bgservice = ':local dateint do={:local montharray ( "jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec" );:local days [ :pick $d 4 6 ];:local month [ :pick $d 0 3 ];:local year [ :pick $d 7 11 ];:local monthint ([ :findOrFail $montharray $month]);:local month ($monthint + 1);:if ( [len $month] = 1) do={:local zero ("0");:return [:tonum ("$year$zero$month$days")];} else={:return [:tonum ("$year$month$days")];}}; :local timeint do={ :local hours [ :pick $t 0 2 ]; :local minutes [ :pick $t 3 5 ]; :return ($hours * 60 + $minutes) ; }; :local date [ /system clock get date ]; :local time [ /system clock get time ]; :local today [$dateint d=$date] ; :local curtime [$timeint t=$time] ; :foreach i in [ /ip hotspot user findOrFail where profile="'.$name.'" ] do={ :local comment [ /ip hotspot user get $i comment]; :local name [ /ip hotspot user get $i name]; :local gettime [:pic $comment 12 20]; :if ([:pic $comment 3] = "/" and [:pic $comment 6] = "/") do={:local expd [$dateint d=$comment] ; :local expt [$timeint t=$gettime] ; :if (($expd < $today and $expt < $curtime) or ($expd < $today and $expt > $curtime) or ($expd = $today and $expt < $curtime)) do={ [ /ip hotspot user '.$mode.' $i ]; [ /ip hotspot active remove [findOrFail where user=$name] ];}}}';

            $mkt = session('active');
            $config =(new Config())
                ->set('timeout', 1)
                ->set('host',$mkt->host)
                ->set('user',  $mkt->username)
                ->set('pass', $mkt->password)
                ->set('port', (int)$mkt->port);
            $client = new Client($config);
            $query = new Query('/ip/hotspot/user/profile/add');
            $query->equal('name', $name);
            $query->equal('address-pool', $addrpool);
            $query->equal('rate-limit', $ratelimit);
            $query->equal('shared-user', $sharedusers);
            $query->equal('status-autorefresh', "1m");
            $query->equal('transparent-proxy', "yes");
            $query->equal('on-login', $onlogin);
            if(isset($parent))
                $query->equal('parent-queue', $parent);
            $response = $client->query($query)->read();
//            dd($response);

            if($expmode != "0"){
                if (empty($monid)){
                    $query = new Query('/system/scheduler/add');
                    $query->equal('name', $name);
                    $query->equal('start-time', $randstarttime);
                    $query->equal('interval', $randinterval);
                    $query->equal('on-event', $bgservice);
                    $query->equal('disabled', "no");
                    $query->equal('comment', "Monitor Profile $name");
                    $response = $client->query($query)->read();
                }else{
                    $query = new Query('/system/scheduler/set');
                    $query->equal('.id', $monid);
                    $query->equal('name', $name);
                    $query->equal('start-time', $randstarttime);
                    $query->equal('interval', $randinterval);
                    $query->equal('on-event', $bgservice);
                    $query->equal('disabled', "no");
                    $query->equal('comment', "Monitor Profile $name");
                    $response = $client->query($query)->read();
                }
            }else{
//                $query = new Query('/system/scheduler/remove');
//                $query->equal('.id', $monid);
//                $response = $client->query($query)->read();
            }
            $query =
                (new Query('/ip/hotspot/user/profile/print'))
                    ->where('name', $name);
            $getprofile = $client->query($query)->read();
            $pid = $getprofile[0]['.id'];
            $hotspot = $mkt->hotspot()->firstOrFail();
            $hotspot->hotspotprofile()->create([
                'id_in_mkt' => $pid,
                'name' => $name,
                'address-pool' => $addrpool ?? 'N/A',
                'status-autorefresh' => '1m',
                'shared-user' => $sharedusers ?? 'N/A',
                'rate-limit' => $ratelimit ?? 'N/A',
                'transparent-proxy' => 'yes',
                'price' => $price ?? 'N/A',
                'sale-price' => $sprice ?? 'N/A',
            ]);
            Synchronize::connect();
            Synchronize::sync_hotspot_profile();
            return redirect('/hotspotprofile')->with('success','Profile Added Succesfully');
        }
    }
    public function show(HotspotProfile $hotspotProfile)
    {
    }
    public function edit(HotspotProfile $hotspotProfile)
    {
        //
    }
    public function update(Request $request, HotspotProfile $hotspotProfile)
    {
        //
    }

    public function destroy(HotspotProfile $hotspotProfile)
    {
        //
    }
}
