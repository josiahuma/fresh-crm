<?php

namespace App\Http\Controllers;
use App\Models\Leader;
use App\Models\Member;
use Illuminate\Http\Request;

class FollowupsController extends Controller
{
    //
    public function index()
    {
        $leaders = Leader::all();
        return view('followups.index', compact('leaders'));
    }

    public function showMembers(Request $request)
    {
        $leaderName = $request->input('leader_name');
        $members = Member::where('church_leader', $leaderName)->get();
        $leaders = Leader::all();
        return view('followups.index', compact('leaders', 'members', 'leaderName'));
    }
}
