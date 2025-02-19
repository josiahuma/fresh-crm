@extends('layouts.app')

@section('content')
<div class="container">
<h1>Edit Leader</h1>
    <form action="{{ route('leaders.update', $leader->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $leader->first_name }}" required @if(auth()->user()->user_type != 'admin') disabled @endif>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $leader->last_name }}" required @if(auth()->user()->user_type != 'admin') disabled @endif>
        </div>
        <div class="form-group">
            <label for="mobile_number">Mobile Number:</label>
            <input type="text" name="mobile_number" id="mobile_number" class="form-control" value="{{ $leader->mobile_number }}" required @if(auth()->user()->user_type != 'admin') disabled @endif>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $leader->email }}" required @if(auth()->user()->user_type != 'admin') disabled @endif>
        </div>
        <div class="form-group">
            <label for="church_unit">Church Unit:</label>
            <select name="church_unit" id="church_unit" class="form-control" value="{{ $leader->church_unit }}"  @if(auth()->user()->user_type != 'admin') disabled @endif>
                <option value="Admin">Admin</option>
                <option value="Choir">Choir</option>
                <option value="Children">Children</option>
                <option value="Youth">Youth</option>
                <option value="Evangelism">Evangelism</option>
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