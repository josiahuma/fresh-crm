@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="my-4">SMS Templates</h1>
        <a href="{{ route('sms_templates.create') }}" class="btn btn-success mb-3">Add Template</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($templates as $template)
                        <tr>
                            <td>{{ $template->name }}</td>
                            <td>{{ $template->message }}</td>
                            <td>
                                <a href="{{ route('sms_templates.edit', $template->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('sms_templates.destroy', $template->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this template?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection