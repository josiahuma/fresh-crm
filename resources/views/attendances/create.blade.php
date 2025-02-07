@extends('layouts.app')

@section('content')
    <h1>Add Attendance</h1>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required>
        <label for="men">Men:</label>
        <input type="number" name="men" id="men" required>
        <label for="women">Women:</label>
        <input type="number" name="women" id="women" required>
        <label for="children">Children:</label>
        <input type="number" name="children" id="children" required>
        <button type="submit">Save</button>
    </form>
@endsection