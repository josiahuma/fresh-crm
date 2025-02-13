<!DOCTYPE html>
<html>
<head>
    <title>Church CRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden; /* Prevent horizontal overflow */
            font-size: 16px;
        }
        .main-container {
            display: flex;
            flex: 1;
            width: 100%; /* Ensure full width */
        }
        .sidebar {
            width: 200px;
            background-color: #343a40;
            color: white;
            padding: 20px;
            display: none; /* Hide sidebar by default */
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
            width: 100%; /* Ensure full width */
        }
        .tile {
            display: inline-block;
            width: 100%;
            height: 100%;
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
        .notice {
            font-size: 18px;
            font-weight: bold;
            color:red;
        }
        @media (min-width: 992px) {
            body {
                flex-direction: row; /* Side by side layout for larger screens */
            }
            .sidebar {
                display: block; /* Show sidebar on larger screens */
            }
            .navbar {
                display: none; /* Hide navbar on larger screens */
            }
        }
        @media (max-width: 768px) {
            body {
                font-size: 14px;
            }
            .container-fluid {
                padding: 10px;
            }
            .table-responsive {
                overflow-x: auto;
            }
            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-lg-none">
        <a class="navbar-brand" href="#">Fresh CRM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('members.index') }}"><i class="fas fa-users"></i> Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('attendances.index') }}"><i class="fas fa-calendar-check"></i> Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('finances.index') }}"><i class="fas fa-dollar-sign"></i> Finance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sms_templates.index') }}"><i class="fas fa-sms"></i> SMS Templates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main-container">
        <div class="sidebar d-none d-lg-block">
            <h2>Fresh CRM</h2>
            <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="{{ route('members.index') }}"><i class="fas fa-users"></i> Members</a>
            <a href="{{ route('attendances.index') }}"><i class="fas fa-calendar-check"></i> Attendance</a>
            <a href="{{ route('finances.index') }}"><i class="fas fa-pound-sign"></i> Finance</a>
            <a href="{{ route('sms_templates.index') }}"><i class="fas fa-sms"></i> SMS Templates</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    <div class="content">
            @yield('content')
        </div>
    </div>
    @endauth
    @guest
    <div class="content">
        @yield('content')
    </div>
    @endguest
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>