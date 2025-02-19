@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Leader</h1>
    <form method="POST" action="{{ route('leaders.store') }}">
    @csrf
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mobile_number">Mobile Number:</label>
            <input type="text" name="mobile_number" id="mobile_number" class="form-control" required>  
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="church_unit">Church Unit:</label>
            <select name="church_unit" id="church_unit" class="form-control" required>
                <option value="Admin">Admin</option>
                <option value="Choir">Choir</option>
                <option value="Prayer">Prayer</option>
                <option value="Ushering">Ushering</option>
                <option value="Protocol">Protocol</option>
                <option value="Media">Media</option>
                <option value="Hospitality">Hospitality</option>
            </select>
        </div>
        <a href="{{ route('leaders.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Save</button>
        
    </form>
</div>
@endsection
