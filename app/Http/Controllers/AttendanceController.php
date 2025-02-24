<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    public function index()
    {
        $attendances = Attendance::all();
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $event_categories = EventCategory::all();
        return view('attendances.create', compact('event_categories'));
    }

    public function store(Request $request)
    {
        $attendance = Attendance::create($request->all());
        return redirect()->route('attendances.index');
    }

    public function createEventCategory()
    {
        return view('attendances.add_event_category');
    }

    public function storeEventCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        EventCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('event_categories.create')->with('success', 'Category added successfully!');
    }

    
}
