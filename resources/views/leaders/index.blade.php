@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="my-4">Leaders</h1>
    <a href="{{ route('leaders.create') }}" class="btn btn-primary mb-3">Add Leader</a>
    <div class="table-responsive">
        <table id="dataTable" data-sort-order="asc" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Members Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaders as $leader)
                    <tr>
                        <td>{{ $leader->id }}</td>
                        <td>{{ $leader->first_name }}</td>
                        <td>{{ $leader->last_name }}</td>
                        <td>{{ $leader->mobile_number }}</td>
                        <td>{{ $leader->email }}</td>
                        <td>{{ $leader->members_count }}</td>
                        <td>
                            <a href="{{ route('leaders.show', $leader->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('leaders.edit', $leader->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('leaders.destroy', $leader->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection