<?php

namespace App\Http\Controllers;
use App\Models\Finance;
use App\Models\IncomeCategory;
use App\Models\ExpenseCategory;
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
        $income_categories = IncomeCategory::all();
        $expense_categories = ExpenseCategory::all();
        return view('finances.create', compact('income_categories', 'expense_categories'));
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

    public function createIncomeCategory()
    {
        return view('finances.add_income_category');
    }

    public function storeIncomeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        IncomeCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('income_categories.create')->with('success', 'Category added successfully!');
    }

    public function createExpenseCategory()
    {
        return view('finances.add_expense_category');
    }

    public function storeExpenseCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ExpenseCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('expense_categories.create')->with('success', 'Category added successfully!');
    }

}
