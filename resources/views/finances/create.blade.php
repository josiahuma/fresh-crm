@extends('layouts.app')

@section('content')
    <h1>Add Finance Record</h1>
    <form action="{{ route('finances.store') }}" method="POST">
        @csrf
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required>
        <label for="income">Income:</label>
        <input type="number" step="0.01" name="income" id="income" required>
        <label for="expense">Expense:</label>
        <input type="number" step="0.01" name="expense" id="expense" required>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description">
        <button type="submit">Save</button>
    </form>
@endsection