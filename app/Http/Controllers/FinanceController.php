<?php

namespace App\Http\Controllers;
use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    //
    public function index()
    {
        $finances = Finance::all();
        return view('finances.index', compact('finances'));
    }

    public function create()
    {
        return view('finances.create');
    }

    public function store(Request $request)
    {
        $finance = Finance::create($request->all());
        return redirect()->route('finances.index');
    }
}
