<?php

namespace App\CustomClasses;

use App\Mikrotik;
use App\Queue_type;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Query;


class Synchronize
{
    private static $client;

    public static function connect()
    {
        $user = Auth::user();
        $mkt = $user->mikrotiks()->first();
        $config = (new Config())
            ->set('timeout', 1)
            ->set('host', $mkt->host)
            ->set('user', $mkt->username)
            ->set('pass', $mkt->password)
            ->set('port', (int)$mkt->port);
        static::$client = new Client($config);
        return static::$client;
    }

    public static function sync_queue_types()
    {
        if (isset(session('active')->identity)) {
            $mkt = session('active');
        } else {
            dd('no default mkt');
        };
        $client = static::$client;
        $mkt->queue_type()->delete();
        $response = $client->qr('/queue/type/print');
        foreach ($response as $item) {
            try {
                $mkt->queue_type()->create([
                    'id_in_mkt' => $item['.id'],
                    'name' => $item['name'],
                    'kind' => $item['kind'],
                    'pcq_rate' => $item['pcq-rate'] ?? 'n/a',
                    'pcq_classifier' => $item['pcq-classifier'] ?? 'n/a',
                    'burst_rate' => $item['pcq-burst-rate'] ?? 'n/a',
                    'burst_threshold' => $item['pcq-burst-threshold'] ?? 'n/a',
                    'burst_time' => $item['pcq-burst-time'] ?? 'n/a',
                ]);
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    continue;
                } else
                    dd($e->getMessage());
            }
        }
    }

    public static function sync_queues()
    {
        if (isset(session('active')->identity)) {
            $mkt = session('active');
        } else {
            dd('no default mkt');
        };
        $client = static::$client;
        $mkt->queue()->delete();
        $response = $client->qr('/queue/simple/print');
        foreach ($response as $item) {
            try {
                $que = $item['queue'];
                $q_name = explode('/', $que)[0];
                $q = Queue_type::where('name', $q_name)->firstOrFail();
                $mkt->queue()->create([
                    'id_in_mkt' => $item['.id'],
                    'name' => $item['name'],
                    'queue_type_id' => $q->id,
                    'target' => $item['target'],
                    'dst' => $item['dst'],
                    'parent' => $item['parent'],
                    'packet-marks' => $item['packet-marks'],
                    'priority' => $item['priority'],
                    'max-limit' => $item['max-limit'] ?? "",
                    'burst-limit' => $item['burst-limit'] ?? "",
                    'burst-threshold' => $item['burst-threshold'] ?? "",
                    'burst-time' => $item['burst-time'] ?? "",
                    'burst-size' => $item['burst-size'] ?? "",
                    'comment' => $item['comment'] ?? "",
                ]);
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    continue;
                } else
                    dd($e->getMessage());
            }
        }
    }

    public static function sync_ipaddress()
    {
        if (isset(session('active')->identity)) {
            $mkt = session('active');
        } else {
            dd('no default mkt');
        };
        $client = static::$client;
        $mkt->ipaddress()->delete();
        $response = $client->qr('/ip/address/print');
        foreach ($response as $item) {
            try {
                $mkt->ipaddress()->create([
                    'id_in_mkt' => $item['.id'],
                    'address' => $item['address'],
                    'network' => $item['network'] ?? 'N/A',
                    'interface' => $item['interface'] ?? 'N/A'
                ]);
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    continue;
                } else
                    dd($e->getMessage());
            }
        }
        return view('hotspot.index');
    }

    public static function sync_hotspot_profile()
    {
        if (isset(session('active')->identity)) {
            $mkt = session('active');
        } else {
            dd('no default mkt');
        };
        $hotspot = $mkt->hotspot()->firstOrFail();
        $hotspot->hotspotprofile()->delete();
        $client = static::$client;
        $response = $client->qr('/ip/hotspot/user/profile/print');
        $response = array_slice($response, 1, -1);
        foreach ($response as $item) {
            try {
                $hotspot->hotspotprofile()->create([
                    'id_in_mkt' => $item['.id'],
                    'name' => $item['name'],
                    'address-pool' => $item['address-pool'] ?? 'N/A',
                    'status-autorefresh' => $item['status-autorefresh'] ?? 'N/A',
                    'shared-user' => $item['shared-users'] ?? 'N/A',
                    'parent-queue' => $item['parent-queue'] ?? 'N/A',
                ]);
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    continue;
                } else
                    dd($e->getMessage());
            }
        }
    }

    public static function sync_hotspot()
    {
        if (isset(session('active')->identity)) {
            $mkt = session('active');
        } else {
            dd('no default mkt');
        };
        $client = static::$client;
        $mkt->hotspot()->delete();
        $response = $client->qr('/ip/hotspot/print');
        foreach ($response as $item) {
            try {
                $mkt->hotspot()->create([
                    'id_in_mkt' => $item['.id'],
                    'server' => $item['server'] ?? 'N/A',
                    'name' => $item['name'],
                    'address-pool' => $item['address-pool'],
                    'profile' => $item['profile'],
                    'idle-timeout' => $item['idle-timeout'],
                    'keepalive-timeout' => $item['keepalive-timeout'],
                    'login-timeout' => $item['login-timeout'],
                    'addresses-per-mac' => $item['addresses-per-mac'],
                    'proxy-status' => $item['proxy-status'],
                    'invalid' => $item['invalid'],
                    'HTTPS' => $item['HTTPS'],
                ]);
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    continue;
                } else
                    dd($e->getMessage());
            }
        }
    }

    public static function sync_packages()
    {
        if (isset(session('active')->identity)) {
            $mkt = session('active');
        } else {
            dd('no default mkt');
        };
        $client = static::$client;
        $mkt->packages()->delete();
        $response = $client->qr('/ppp/profile/print');
        $response = array_slice($response, 1, -1);
        foreach ($response as $item) {
            try {
                $mkt->packages()->create(['id_in_mkt' => $item['.id'],
                    'name' => $item['name'],
                    'localAddress' => $item['local-address'] ?? 'N/A',
                    'remoteAddress' => $item['remote-address'] ?? 'N/A',
                    'onlyOne' => $item['only-one'],
                    'rateLimit' => $item['rate-limit'] ?? 'N/A',
                    'dns' => $item['dns-server'] ?? 'N/A',]);
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    continue;
                } else
                    dd($e->getMessage());
            }
        }
    }

    public static function sync_interfaces()
    {
        if (isset(session('active')->identity)) {
            $mkt = session('active');
        } else {
            dd('no default mkt');
        };
        $client = static::$client;
        $mkt->intrface()->delete();
        $response = $client->qr('/interface/print');
        foreach ($response as $item) {
            try {
                $mkt->intrface()->create([
                    'id_in_mkt' => $item['.id'],
                    'name' => $item['name'],
                    'type' => $item['type'],
                    'mtu' => $item['mtu'],
                    'mac-address' => $item['mac-address'],
                    'last-link-up-time' => $item['last-link-up-time'] ?? 'N/A',
                ]);
            } catch
            (\Exception $e) {
                if ($e->getCode() == 23000) {
                    continue;
                } else
                    dd($e->getMessage());
            }
        }
    }

    public static function sync_pool()
    {
        if (isset(session('active')->identity)) {
            $mkt = session('active');
        } else {
            dd('no default mkt');
        };
        $client = static::$client;
        $mkt->pool()->delete();
        $response = $client->qr('/ip/pool/print');
        foreach ($response as $item) {
            try {
                $mkt->pool()->create([
                    'id_in_mkt' => $item['.id'],
                    'name' => $item['name'],
                    'ranges' => $item['ranges'],
                ]);
            } catch
            (\Exception $e) {
                if ($e->getCode() == 23000) {
                    continue;
                } else
                    dd($e->getMessage());
            }
        }
    }

    public static function sync_hotspot_user()
    {
        if (isset(session('active')->identity)) {
            $mkt = session('active');
        } else {
            dd('no default mkt');
        };
        $client = static::$client;
        $hotspot = $mkt->hotspot()->firstOrFail();
        $hotspot->hotspotuser()->delete();
        $response = $client->qr('/ip/hotspot/user/print');
        foreach ($response as $item) {
            try {
                $hotspot->hotspotuser()->create([
                    'id_in_mkt' => $item['.id'],
                    'name' => $item['name'],
                    'password' => $item['password'] ?? 'N/A',
                    'profile' => $item['profile'] ?? 'N/A',
                    'limit-uptime' => $item['limit-uptime'] ?? 'N/A',
                    'limit-bytes-total' => $item['limit-bytes-total'] ?? 'N/A',
                    'uptime' => $item['uptime'],
                    'bytes-in' => $item['bytes-in'],
                    'bytes-out' => $item['bytes-out'],
                    'packets-in' => $item['packets-in'],
                    'packets-out' => $item['packets-out'],
                    'dynamic' => $item['dynamic'],
                ]);
            } catch
            (\Exception $e) {
                if ($e->getCode() == 23000) {
                    continue;
                } else
                    dd($e->getMessage());
            }
        }
    }

    public static function all()
    {
        Synchronize::sync_pool();
        Synchronize::sync_hotspot();
        Synchronize::sync_hotspot_profile();
        Synchronize::sync_hotspot_user();
        Synchronize::sync_packages();
        Synchronize::sync_queue_types();
        Synchronize::sync_queues();
        Synchronize::sync_ipaddress();
        Synchronize::sync_interfaces();
    }
}
