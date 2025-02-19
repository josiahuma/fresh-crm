@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <h1>View Leader</h1>
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="first_name">First Name:</label>
        <label for="first_name">{{ $leader->first_name }}</label>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name:</label>
        <label for="last_name">{{ $leader->last_name }}</label>
    </div>
    <div class="form-group">
        <label for="mobile_number">Mobile Number:</label>
        <label for="mobile_number">{{ $leader->mobile_number }}</label>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <label for="email">{{ $leader->email }}</label>
    </div>
    <div class="form-group">
        <label for="church_unit">Church Unit:</label>
        <label for="church_unit">{{ $leader->church_unit }}</label>
    </div>
    <div class="form-group">
        <a href="{{ route('leaders.index') }}" class="btn btn-secondary">Back</a>
        <a href="{{ route('leaders.edit', $leader->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('leaders.destroy', $leader->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this leader?')">Delete</button>
        </form>
    </div>
</div>
@endsection