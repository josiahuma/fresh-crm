<!DOCTYPE html>
<html>
<head>
    <title>Church CRM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 200px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .tile {
            display: inline-block;
            width: 200px;
            height: 100px;
            margin: 10px;
            color: white;
            text-align: center;
            line-height: 100px;
            font-size: 24px;
            border-radius: 8px;
        }
        .tile-members {
            background-color: #007bff;
        }
        .tile-attendance {
            background-color: #ffc107;
        }
        .tile-income {
            background-color: #28a745;
        }
        .tile-expenses {
            background-color: #dc3545;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #e6f7ff;
        }
    </style>
</head>
<body>
    @auth
    <div class="sidebar">
        <h2>Church CRM</h2>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('members.index') }}">Members</a>
        <a href="{{ route('attendances.index') }}">Attendance</a>
        <a href="{{ route('finances.index') }}">Finance</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    @endauth
    <div class="content">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>