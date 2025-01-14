<?php

namespace App\Http\Controllers;

use App\Models\Clubs;
use App\Models\Players;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Players::orderBy('created_at', 'desc')->paginate(10);
        return view('player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clubs = Clubs::all();
        return view('player.create', compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'position' => 'required | string',
            'number' => 'required | numeric | gt:0',
            'birthday' => 'required | date',
            'club_id' => 'required | numeric | gt:0',
        ]);
        Players::create($request->all());
        return redirect()->route('player.index')->with('success', 'Player created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clubs = Clubs::all();
        $player = Players::find($id);
        return view('player.edit', compact('clubs', 'player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required | string',
            'position' => 'required | string',
            'number' => 'required | numeric | gt:0',
            'birthday' => 'required | date',
            'club_id' => 'required | numeric | gt:0',
        ]);
        Players::find($id)->update($request->all());
        return redirect()->route('player.index')->with('success', 'Player updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Players::destroy($id);
        return redirect()->route('player.index')->with('success', 'Player deleted successfully');
    }
}
