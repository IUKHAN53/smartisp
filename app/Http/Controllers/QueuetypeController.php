<?php

namespace App\Http\Controllers;

use App\CustomClasses\Synchronize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use RouterOS\Client;
use RouterOS\Config;
use RouterOS\Query;

class QueuetypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $types = Auth::user()->mikrotiks()->first()->queue_type();
        return view('queue.showtype')->with('types',$types);
    }

    public function create()
    {
        return view('queue.createtype');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'kind' => 'required',
            'pcq_rate' => 'required',
            'pcq_burst_rate' => 'required',
            'pcq_burst_threshold' => 'required',
            'pcq_burst_time' => 'required',
        ]);
        $mkt = Auth::user()->mikrotiks()->first();
        try {
            $config = (new Config())
                ->set('timeout', 1)
                ->set('host', $mkt->host)
                ->set('user', $mkt->username)
                ->set('pass', $mkt->password)
                ->set('port', (int)$mkt->port);
            $client = new Client($config);
        if($request['dst'] === 'on' && $request['src'] === 'on'){
            $classifer = 'dst-address,src-address';
        }
        elseif ($request['dst'] === 'on'){
            $classifer = 'dst-address';
        }
        elseif ($request['src'] === 'on'){
            $classifer = 'src-address';
        }
        else
            $classifer = '';
            $query = new Query('/queue/type/add');
            $query->equal('name', $request->get('name'));
            $query->equal('kind', $request->get('kind'));
            $query->equal('pcq-rate', $request->get('pcq_rate'));
            $query->equal('pcq-burst-rate', $request->get('pcq_burst_rate'));
            $query->equal('pcq-burst-threshold', $request->get('pcq_burst_threshold'));
            $query->equal('pcq-burst-time', $request->get('pcq_burst_time'));
            $query->equal('pcq-classifier', $classifer);
            $response = $client->query($query)->read();
        } catch (Exception $e) {
            ob_clean();
            return response()->json(['Failed' => $e->getMessage()]);
        }
        Synchronize::connect();
        Synchronize::sync_queue_type();
        ob_clean();
        return response()->json(['success' => 'Added Succesfully']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
