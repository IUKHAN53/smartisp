<?php

namespace App\Http\Controllers;

use App\Intrface;
use App\Ipaddress;
use App\Queue;
use App\Queue_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Query;

class QueueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $queues = Queue::all();
        return view('queue.index',[
            'queue' => $queues
        ]);
    }


    public function create()
    {
        $queue_type = Queue_type::all();
        $ip = Ipaddress::all();
        $int = Intrface::all();
        return view('queue.create',[
            'queue_type' => $queue_type,
            'ip' => $ip,
            'int' => $int,
        ]);
    }

    public function store(Request $request)
    {
        if(session()->has('active')){
$mkt = session('active');}
else{dd('no default mkt');};
        $config =(new Config())
            ->set('timeout', 1)
            ->set('host',$mkt->host)
            ->set('user',  $mkt->username)
            ->set('pass', $mkt->password)
            ->set('port', (int)$mkt->port);
        $client = new Client($config);
        $query = new Query('/queue/simple/add');
        if ($request->get('queue_type') != null) {
            $query->equal('name', $request->get('queue_name'));
            $query->equal('target', $request->get('queue_ip'));
            $query->equal('dst', $request->get('queue_dst'));
            $query->equal('priority', $request->get('queue_priority'));
            $query->equal('queue', ($request->get('queue_type') . '/' . $request->get('queue_type')));
            $query->equal('comment', $request->get('queue_comment'));
        } else {
            $query->equal('name', $request->get('queue_name'));
            $query->equal('target', $request->get('queue_ip'));
            $query->equal('dst', $request->get('queue_dst'));
            $query->equal('priority', $request->get('queue_priority'));
            $query->equal('max-limit', $request->get('max_limit'));
            $query->equal('burst-limit', $request->get('burst_limit'));
            $query->equal('burst-threshold', $request->get('burst_threshhold'));
            $query->equal('burst-time', $request->get('burst_time'));
            $query->equal('disabled', 'no');
            $query->equal('comment', $request->get('queue_comment'));
        }
        $response = $client->query($query)->read();
        dd($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function show(Queue $queue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function edit(Queue $queue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Queue $queue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queue $queue)
    {
        //
    }
}
