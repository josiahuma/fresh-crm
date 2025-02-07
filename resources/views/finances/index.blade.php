@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Finance Records</h1>
    <a href="{{ route('finances.create') }}" class="btn btn-success mb-3">Add Finance Record</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Income</th>
                <th>Expense</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($finances as $finance)
                <tr>
                    <td>{{ $finance->date }}</td>
                    <td>{{ $finance->income }}</td>
                    <td>{{ $finance->expense }}</td>
                    <td>{{ $finance->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection