@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Add SMS Template</h1>
        <form action="{{ route('sms_templates.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Template Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" required></textarea>
            </div>
            <a href="{{ route('sms_templates.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection