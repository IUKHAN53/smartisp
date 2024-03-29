<?php

namespace App\Http\Controllers;

use App\Franchise;
use App\Ticket;
use App\TicketCategory;
use App\TicketLog;
use App\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index(Request $request)
    {
        $data = Ticket::with('assigned_to')->with('ticket_by')->with('ticket_category');
        if (isset($request->type)) {
            if ($request->type == 'new-connection') {
                $cat = TicketCategory::whereName('New Connection Request')->first();
                if (!$cat)
                    toastr()->info("No Such category present please create a category named New Connection Request");
                $data = $data->where('ticket_category_id', $cat->id);
            }
            else if($request->type == 'pending'){
                $data = $data->where('status', $request->type);
            }
            else if($request->type == 'closed'){
                $data = $data->where('status', $request->type);
            }
        }
        $data = $data->get();
        foreach ($data as $ticket) {
            $ticket->log = TicketLog::where('belong_id', $ticket->id)->get();
        }
        return view('crm.index')->with('data', $data);
    }

    public function category()
    {
        $data = TicketCategory::all();
        return view('crm.category')->with('data', $data);
    }

    public function create()
    {
        $data['category'] = TicketCategory::all();
        $data['franchise'] = Franchise::all();
        $data['users'] = User::all();
        return view('crm.create')->with('data', $data);

    }

    public function category_create()
    {
        $data['category'] = TicketCategory::all();
        $data['franchise'] = Franchise::all();
        return view('crm.category_create')->with('data', $data);

    }

    public function category_destroy(TicketCategory $ticketCategory)
    {
        try{
            $ticketCategory->delete();
        }catch (\Exception $e){
            ob_clean();
            return response()->json([
                'status'=>'failed',
                'message'=>'Unable to delete category: Please remove related tickets first',
            ]);
        }
        ob_clean();
    }

    public function category_store(Request $request)
    {
        $request->validate(['title' => 'required|string']);
        $cat = TicketCategory::create(['name' => $request->title]);
        ($cat) ? toastr()->success('Added Category Successfully', 'Success') : toastr()->error('Failed to add Category', 'Failed');
        return redirect(route('ticket-category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'franchise' => 'required',
            'title' => 'required|string',
            'priority' => 'required',
            'content' => 'required|string',
            'assign_to' => 'required'
        ]);
        $ticket = Ticket::create([
            'title' => $request->title,
            'content' => $request->title,
            'status' => 'pending',
            'priority' => $request->priority,
            'ticket_category_id' => $request->category,
            'assigned_to_id' => $request->assign_to,
            'ticket_by_id' => auth()->id(),
            'franchise_id' => $request->franchise,
        ]);
        ($ticket) ? toastr()->success('Added Ticket Successfully', 'Success') : toastr()->error('Failed to add ticket', 'Failed');
        return redirect(route('ticket.index'));
    }

    public function show(Ticket $ticket)
    {
        //
    }

    public function edit(Ticket $ticket)
    {
        $data['franchise'] = Franchise::all();

        return view('crm.edit')
            ->with('ticket', $ticket)
            ->with('categories', TicketCategory::all())
            ->with('users', User::all())
            ->with('franchises', Franchise::all());
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'category' => 'required',
            'franchise' => 'required',
            'title' => 'required|string',
            'priority' => 'required',
            'content' => 'required|string',
            'assign_to' => 'required',
            'status' => 'required|string',
        ]);
        $ticket->update($request);
        toastr()->success('Updated Ticket Successfully', 'Success');
        return redirect(route('ticket.index'));
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        ob_clean();
    }
}
