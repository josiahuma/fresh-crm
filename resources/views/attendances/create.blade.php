@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Attendance</h1>
        <form action="{{ route('attendances.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="men">Men:</label>
                <input type="number" name="men" id="men" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="women">Women:</label>
                <input type="number" name="women" id="women" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="children">Children:</label>
                <input type="number" name="children" id="children" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" name="total" id="total" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="event">Event:</label>
                <select name="event" id="event" class="form-control" required>
                    @foreach($event_categories as $event_category)
                        <option value="{{ $event_category->name }}">{{ $event_category->name }}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const menInput = document.getElementById('men');
        const womenInput = document.getElementById('women');
        const childrenInput = document.getElementById('children');
        const totalInput = document.getElementById('total');

        function updateTotal() {
            const men = parseInt(menInput.value) || 0;
            const women = parseInt(womenInput.value) || 0;
            const children = parseInt(childrenInput.value) || 0;
            const total = men + women + children;
            totalInput.value = total;
        }

        menInput.addEventListener('input', updateTotal);
        womenInput.addEventListener('input', updateTotal);
        childrenInput.addEventListener('input', updateTotal);
    });
</script>
@endsection