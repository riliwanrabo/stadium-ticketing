<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        // loads ticket's page
        $tickets = Ticket::where('user_id', auth()->user()->id)
        ->get();
        
        return view('tickets.index',compact('tickets'));
    }

    public function store(Request $request)
    {
        //  store ticket information
        $ticket = new Ticket([
            'user_id' => auth()->user()->id,
            'fixture_id' => $request->fixture_id
        ]);

        if($ticket->save()){
            return response([
                'success' => true,
                'message' => 'Ticket was booked successfully',
                
                'data' => $ticket->with(['user','fixture.home_team', 'fixture.away_team'])->first(),
                
                
            ], 200);
        }
    }
}