@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add New Church Unit Category</h1>
    <form action="{{ route('church_unit_categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Category Alias:</label>
            <input type="text" name="alias" id="alias" class="form-control" required>
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
                    <th>Alias</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\ChurchUnitCategory::all() as $church_unit_category)
                    <tr>
                        <td>{{ $church_unit_category->id }}</td>
                        <td>{{ $church_unit_category->name }}</td>
                        <td>{{ $church_unit_category->alias }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection