@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Finance Record</h1>

    <!-- Form for Recording Income -->
    <h2>Record Income</h2>
    <form action="{{ route('finances.storeIncome') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Income Amount:</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <select name="description" id="description" class="form-control" required>
                @foreach($income_categories as $income_category)
                    <option value="{{ $income_category->name }}">{{ $income_category->name }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('finances.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Save Income</button>
    </form>
    <hr>
    <!-- Form for Recording Expenses -->
    <h2>Record Expense</h2>
    <form action="{{ route('finances.storeExpense') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Expense Amount:</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <select name="description" id="description" class="form-control" required>
                @foreach($expense_categories as $expense_category)
                    <option value="{{ $expense_category->name }}">{{ $expense_category->name }}</option>
                @endforeach
            </select>
        </div>
        <a href="{{ route('finances.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Save Expense</button>
    </form>
</div>
@endsection