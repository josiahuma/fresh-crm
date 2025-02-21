@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add New Event Category</h1>
    <form action="{{ route('event_categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
    <br />
    <div class="table-responsive">
        <table id="dataTable" data-sort-order="asc" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\EventCategory::all() as $event_category)
                    <tr>
                        <td>{{ $event_category->id }}</td>
                        <td>{{ $event_category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection