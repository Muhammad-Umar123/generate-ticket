<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Symfony\Contracts\EventDispatcher\Events;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Event::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!session()->has('ticket_link')) {
            session(['ticket_link' => $this->generateTicketLink()]);
        }

        $ticketLink = session('ticket_link');

        return view('tickets.create', compact('ticketLink'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_datetime' => 'required|date_format:Y-m-d\TH:i',
            'venue' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'row' => 'required|string|max:255',
            'seat' => 'required|string|max:255',
            'ticket_type' => 'required|string|max:255',
            'ticket_link' => 'required|string|max:255',
        ]);

        Event::create($request->all());
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTicketsByLink($link)
    {
        $tickets = Event::where('ticket_link', $link)->get();
        return view('tickets.show_by_link', compact('tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Event::findOrFail($id);
        return view('tickets.edit', compact('ticket', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_datetime' => 'required|date_format:Y-m-d\TH:i',
            'venue' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'row' => 'required|string|max:255',
            'seat' => 'required|string|max:255',
            'ticket_type' => 'required|string|max:255',
            'ticket_link' => 'required|string|max:255',
        ]);

        $ticket = Event::findOrFail($id);
        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Event::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }


    private function generateTicketLink()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $link = '';
        $maxIndex = strlen($characters) - 1;

        for ($i = 0; $i < 32; $i++) {
            $link .= $characters[rand(0, $maxIndex)];
            if (($i + 1) % 8 === 0 && $i != 31) {
                $link .= '-';
            }
        }

        return $link;
    }

    public function regenerateLink()
    {
        $newLink = $this->generateTicketLink();
        session(['ticket_link' => $newLink]);
        return response()->json(['ticket_link' => $newLink]);
    }
}
