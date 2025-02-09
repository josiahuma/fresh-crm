@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Finance Record</h1>
        <form action="{{ route('finances.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="income">Income:</label>
                <input type="number" step="0.01" name="income" id="income" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="expense">Expense:</label>
                <input type="number" step="0.01" name="expense" id="expense" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
            <a href="{{ route('finances.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection