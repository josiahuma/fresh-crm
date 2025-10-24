<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh - CRM</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero-section {
            padding: 100px 0;
            text-align: center;
        }
        .feature-icon {
            font-size: 40px;
            color: #fd7e14;
            margin-bottom: 15px;
        }
        .footer {
            padding: 30px 0;
            background-color: #343a40;
            color: white;
        }
        .footer-link {
            color: #fff;
        }
        .footer-link:hover {
            color: #ffc107;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-primary" href="{{ url('/') }}">Fresh CRM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 font-weight-bold">Fresh CRM System</h1>
            <p class="lead mt-3 mb-4">Efficiently manage clients/members, finances, SMS communication, attendance records, and more—all in one place.</p>
        </div>
    </div>
    </section>

    <!-- Features -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-3 text-center">
                <div class="card shadow-sm p-3">
                    <h4>Members Management</h4>
                    <p>Easily store, manage, and organize your client member details.</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card shadow-sm p-3">
                    <h4>SMS Messaging</h4>
                    <p>Send instant or scheduled bulk SMS messages directly from your dashboard.</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card shadow-sm p-3">
                    <h4>Attendance Tracking</h4>
                    <p>Quickly record weekly attendance and generate insightful reports.</p>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="card shadow-sm p-3">
                    <h4>Finance Management</h4>
                    <p>Track income, expenses, and financial health at a glance.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Call-to-Action -->
    <div class="container text-center py-5">
        
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p>&copy; {{ date('Y') }} Fresh. All rights reserved.</p>
            <div class="mt-2">
                <a href="#" class="footer-link mx-2">Privacy Policy</a>
                <a href="#" class="footer-link mx-2">Terms of Service</a>
                <a href="#" class="footer-link mx-2">Support</a>
            </div>
        </div>
    </footer>

    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
