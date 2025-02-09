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

    public function storeIncome(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Finance::create([
            'date' => $request->date,
            'amount' => $request->amount,
            'description' => $request->description,
            'type' => 'income',
        ]);

        return redirect()->route('finances.index')->with('success', 'Income recorded successfully!');
    }

    public function storeExpense(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Finance::create([
            'date' => $request->date,
            'amount' => $request->amount,
            'description' => $request->description,
            'type' => 'expense',
        ]);

        return redirect()->route('finances.index')->with('success', 'Expense recorded successfully!');
    }
}
