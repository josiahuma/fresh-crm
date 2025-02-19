<?php
namespace App\Http\Controllers;

use App\Models\Leader;
use App\Models\Member; 
use Illuminate\Http\Request;

class LeaderController extends Controller 
{ 
    public function index() 
    { 
        $leaders = Leader::all(); 
        return view('leaders.index', compact('leaders')); 
    }

    public function create()
    {
        return view('leaders.create');
    }

    public function store(Request $request)
    {
        Leader::create($request->all());
        return redirect()->route('leaders.index');
    }

    public function show(Leader $leader)
    {
        return view('leaders.profile', compact('leader'));
    }

    public function edit(Leader $leader)
    {
        return view('leaders.edit', compact('leader'));
    }

    public function update(Request $request, Leader $leader)
    {
        $leader=Leader::findOrFail($leader->id);
        $leader->update($request->all());
        return redirect()->route('leaders.index')->with('success', 'Leader updated successfully.');
    }

    public function destroy(Leader $leader)
    {
        $leader=Leader::findOrFail($leader->id);
        $leader->delete();
        return redirect()->route('leaders.index')->with('success', 'Leader deleted successfully.');
    }

    
}