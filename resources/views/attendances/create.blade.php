@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Attendance</h1>
        <form action="{{ route('attendances.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="men">Men:</label>
                <input type="number" name="men" id="men" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="women">Women:</label>
                <input type="number" name="women" id="women" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="children">Children:</label>
                <input type="number" name="children" id="children" class="form-control" required>
            </div>
            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection