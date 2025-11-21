<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh CRM – Simple, Powerful Client Management</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        :root {
            --primary: #007bff;
            --primary-soft: rgba(253, 126, 20, 0.1);
            --dark: #1f2933;
            --muted: #6c757d;
        }

        * {
            scroll-behavior: smooth;
        }

        body {
            background-color: #f8f9fb;
            color: #212529;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .navbar {
            padding: 0.9rem 1rem;
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: 0.03em;
        }

        .nav-link {
            font-weight: 500;
            color: #4a5568 !important;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .btn-primary {
            background-image: linear-gradient(135deg, #007bff, #67a9f0);
            border: none;
        }

        .btn-primary:hover {
            filter: brightness(0.95);
        }

        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: #fff;
        }

        /* HERO */
        .hero {
            padding: 90px 0 70px;
            background: radial-gradient(circle at top left, #ffe9d3 0, transparent 55%),
                        radial-gradient(circle at bottom right, #e3f2fd 0, transparent 55%),
                        #f8fafc;
        }

        .hero-eyebrow {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            font-weight: 600;
            color: var(--primary);
        }

        .hero-title {
            font-size: 2.4rem;
            font-weight: 800;
            color: var(--dark);
        }

        @media (min-width: 992px) {
            .hero-title {
                font-size: 3rem;
            }
        }

        .hero-subtitle {
            font-size: 1.05rem;
            color: #4a5568;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            font-size: 0.8rem;
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            background-color: #fff;
            border: 1px solid #e5e7eb;
            margin-bottom: 1rem;
        }

        .hero-badge span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            border-radius: 999px;
            background: var(--primary-soft);
            color: var(--primary);
            margin-right: 0.4rem;
        }

        .hero-metrics {
            margin-top: 2rem;
        }

        .hero-metrics small {
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 0.1em;
            color: #9ca3af;
        }

        .hero-metric-number {
            font-weight: 700;
            font-size: 1.1rem;
        }

        .hero-illustration {
            position: relative;
        }

        .hero-card {
            background: #fff;
            border-radius: 1.25rem;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
            padding: 1.4rem 1.5rem;
            max-width: 420px;
            margin: 0 auto;
        }

        .hero-card-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .hero-avatar {
            width: 44px;
            height: 44px;
            border-radius: 999px;
            background: linear-gradient(135deg, #007bff, #67a9f0);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            margin-right: 0.75rem;
        }

        .hero-chip {
            padding: 0.25rem 0.6rem;
            border-radius: 999px;
            background-color: #ecfdf3;
            color: #15803d;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .hero-card-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            padding: 0.45rem 0;
        }

        .hero-card-row + .hero-card-row {
            border-top: 1px dashed #e5e7eb;
        }

        .hero-tag {
            display: inline-block;
            padding: 0.25rem 0.6rem;
            border-radius: 999px;
            background-color: var(--primary-soft);
            font-size: 0.75rem;
            color: #92400e;
            margin-right: 0.35rem;
            margin-top: 0.2rem;
        }

        .hero-shadow-pill {
            position: absolute;
            width: 210px;
            height: 210px;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(253, 126, 20, 0.3), transparent 70%);
            opacity: 0.4;
            top: -20px;
            right: 0;
            z-index: -1;
        }

        /* SECTION TITLES */
        .section-title {
            font-weight: 700;
            font-size: 1.7rem;
            color: var(--dark);
        }

        .section-subtitle {
            color: #6b7280;
            max-width: 540px;
            margin: 0 auto;
        }

        /* FEATURES */
        .feature-card {
            border-radius: 1rem;
            border: 1px solid #e5e7eb;
            background-color: #fff;
            padding: 1.4rem 1.4rem 1.6rem;
            height: 100%;
            transition: transform 0.15s ease, box-shadow 0.15s ease, border 0.15s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            border-color: rgba(253, 126, 20, 0.4);
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            border-radius: 0.9rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary-soft);
            color: var(--primary);
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
        }

        .feature-title {
            font-size: 1.05rem;
            font-weight: 700;
        }

        .feature-text {
            font-size: 0.92rem;
            color: #6b7280;
        }

        /* HOW IT WORKS */
        .step-badge {
            width: 28px;
            height: 28px;
            border-radius: 999px;
            background-color: #fff;
            border: 1px solid #e5e7eb;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 700;
            margin-right: 0.6rem;
            color: var(--primary);
        }

        .timeline-line {
            position: absolute;
            left: 14px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #fde68a, #007bff);
            opacity: 0.3;
        }

        /* PRICING */
        .pricing-card {
            border-radius: 1.3rem;
            border: 1px solid #e5e7eb;
            padding: 1.7rem 1.6rem 1.9rem;
            background-color: #fff;
            height: 100%;
            position: relative;
        }

        .pricing-card.popular {
            border-color: var(--primary);
            box-shadow: 0 24px 60px rgba(249, 115, 22, 0.18);
        }

        .pricing-pill {
            position: absolute;
            top: 1.1rem;
            right: 1.3rem;
            font-size: 0.7rem;
            padding: 0.2rem 0.65rem;
            border-radius: 999px;
            background-color: #fff7ed;
            color: #9a3412;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        .pricing-price {
            font-size: 2rem;
            font-weight: 800;
            color: var(--dark);
        }

        .pricing-price span {
            font-size: 0.9rem;
            color: #6b7280;
            font-weight: 500;
        }

        .pricing-list {
            list-style: none;
            padding-left: 0;
            margin-bottom: 1.1rem;
        }

        .pricing-list li {
            font-size: 0.9rem;
            margin-bottom: 0.45rem;
            color: #4b5563;
        }

        .pricing-list li i {
            color: #16a34a;
            margin-right: 0.4rem;
        }

        /* TESTIMONIAL / STATS */
        .testimonial-card {
            border-radius: 1.3rem;
            background-color: #111827;
            color: #f9fafb;
            padding: 1.7rem 1.7rem 1.8rem;
            position: relative;
            overflow: hidden;
        }

        .testimonial-badge {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            color: #a5b4fc;
        }

        .testimonial-quote {
            font-size: 0.95rem;
            margin: 0.6rem 0 1.1rem;
            color: #e5e7eb;
        }

        .testimonial-meta {
            font-size: 0.85rem;
            color: #9ca3af;
        }

        .testimonial-orb {
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(129, 140, 248, 0.4), transparent 70%);
            right: -40px;
            bottom: -40px;
            opacity: 0.8;
        }

        /* FAQ */
        .faq-item {
            border-bottom: 1px solid #e5e7eb;
            padding: 0.9rem 0;
        }

        .faq-question {
            font-weight: 600;
            font-size: 0.98rem;
            cursor: pointer;
        }

        .faq-answer {
            font-size: 0.9rem;
            color: #6b7280;
            display: none;
            margin-top: 0.35rem;
        }

        .faq-question i {
            font-size: 0.8rem;
            margin-right: 0.3rem;
            color: var(--primary);
        }

        /* CTA SECTION */
        .cta-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #111827, #1f2937);
            color: #f9fafb;
            border-radius: 1.8rem;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(253, 224, 171, 0.22), transparent 70%);
            top: -40px;
            right: -40px;
        }

        .cta-section::after {
            content: "";
            position: absolute;
            width: 140px;
            height: 140px;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(96, 165, 250, 0.35), transparent 70%);
            bottom: -40px;
            left: -40px;
        }

        /* FOOTER */
        footer {
            padding: 30px 0 20px;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .footer-link {
            color: #6b7280;
        }

        .footer-link:hover {
            color: var(--primary);
            text-decoration: none;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand text-primary" href="{{ url('/') }}">
                <span class="mr-1"><i class="fas fa-leaf"></i></span>Fresh CRM
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link" href="#how-it-works">How it works</a>
                    </li>
                    <!--<li class="nav-item mx-lg-2">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li> -->
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item mx-lg-2 mt-2 mt-lg-0">
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-columns mr-1"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item ml-lg-2 mt-2 mt-lg-0">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-1"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="nav-item ml-lg-3 mt-2 mt-lg-0">
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-sign-in-alt mr-1"></i> Login
                                </a>
                            </li>
                            {{-- 
                            @if (Route::has('register'))
                                <li class="nav-item ml-lg-2 mt-2 mt-lg-0">
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">
                                        Start free
                                    </a>
                                </li>
                            @endif
                            --}}
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="hero-badge">
                        <span><i class="fas fa-bolt"></i></span>
                        Built for charities, churches & small businesses
                    </div>
                    <div class="hero-eyebrow">Meet Fresh CRM</div>
                    <h1 class="hero-title mt-2">
                        All-in-one Open Source CRM for people, attendance, SMS & finance.
                    </h1>
                    <p class="hero-subtitle mt-3">
                        Replace spreadsheets and scattered tools with a central hub for your members,
                        communication, weekly attendance and financial records.
                    </p>

                    <div class="mt-4">
                        @if (Route::has('login') && !Auth::check())
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mr-2 mb-2">
                                Start in minutes
                            </a>
                        @else
                            <a href="#pricing" class="btn btn-primary btn-lg mr-2 mb-2">
                                View pricing
                            </a>
                        @endif
                        <a href="#features" class="btn btn-outline-primary btn-lg mb-2">
                            Explore features
                        </a>
                    </div>

                    <div class="hero-metrics d-flex flex-wrap mt-4">
                        <div class="mr-4 mb-3">
                            <small>Average setup time</small><br>
                            <span class="hero-metric-number">Under 10 minutes</span>
                        </div>
                        <div class="mr-4 mb-3">
                            <small>Attendance & finance</small><br>
                            <span class="hero-metric-number">In one simple dashboard</span>
                        </div>
                        <div class="mb-3">
                            <small>SMS powered by</small><br>
                            <span class="hero-metric-number">Trusted gateways</span>
                        </div>
                    </div>
                </div>

                <!-- Illustration -->
                <div class="col-lg-6 hero-illustration">
                    <div class="hero-card">
                        <div class="hero-card-header">
                            <div class="hero-avatar">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div>
                                <div class="small text-muted mb-1">Today’s overview</div>
                                <div class="font-weight-bold">Fresh CRM dashboard</div>
                            </div>
                            <div class="ml-auto hero-chip">
                                Live stats
                            </div>
                        </div>

                        <div class="hero-card-row">
                            <div>
                                <div class="small text-muted">Members</div>
                                <div class="font-weight-bold">1,248 active</div>
                            </div>
                            <div class="text-right">
                                <div class="small text-success">
                                    <i class="fas fa-arrow-up mr-1"></i>+32 this month
                                </div>
                            </div>
                        </div>

                        <div class="hero-card-row">
                            <div>
                                <div class="small text-muted">This week attendance</div>
                                <div class="font-weight-bold">Men 120 · Women 143 · Children 89</div>
                            </div>
                        </div>

                        <div class="hero-card-row">
                            <div>
                                <div class="small text-muted">Finance snapshot</div>
                                <div class="font-weight-bold">£7,930 income · £2,340 expenses</div>
                            </div>
                        </div>

                        <div class="hero-card-row">
                            <div>
                                <div class="small text-muted mb-1">Smart tags</div>
                                <span class="hero-tag">Birthdays this week</span>
                                <span class="hero-tag">New visitors</span>
                                <span class="hero-tag">High-value givers</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero-shadow-pill"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="py-5" id="features">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-title">Everything you need in one place</h2>
                <p class="section-subtitle mt-2">
                    Fresh CRM is built around the daily realities of churches, charities and small teams:
                    people, communication, attendance and money.
                </p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="feature-title">Member database</div>
                        <p class="feature-text mt-2">
                            Centralise member and client records with contact details, custom fields,
                            units/groups, birthdays and anniversaries.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-sms"></i>
                        </div>
                        <div class="feature-title">Bulk SMS & reminders</div>
                        <p class="feature-text mt-2">
                            Send instant or scheduled SMS to everyone or targeted segments.
                            Use message templates and track delivery status.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div class="feature-title">Attendance tracking</div>
                        <p class="feature-text mt-2">
                            Record weekly attendance in seconds (men, women, children) and
                            generate beautiful charts for leadership meetings.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="feature-title">Income & expenses</div>
                        <p class="feature-text mt-2">
                            Log offerings, donations, and running costs. See clear summaries,
                            trends and balances on your finance dashboard.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-birthday-cake"></i>
                        </div>
                        <div class="feature-title">Birthdays & anniversaries</div>
                        <p class="feature-text mt-2">
                            Upcoming birthdays and anniversaries at a glance, with one-click SMS to
                            send greetings and keep people feeling seen.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="feature-title">Multi-user access</div>
                        <p class="feature-text mt-2">
                            Give your admin, finance and follow-up teams the access they need
                            while keeping sensitive information secure.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="feature-title">Cloud-based & secure</div>
                        <p class="feature-text mt-2">
                            Access Fresh CRM from anywhere with secure logins and regular
                            backups. Nothing to install on local machines.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section class="py-5 bg-white" id="how-it-works">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title mb-3">Set up in three simple steps</h2>
                    <p class="text-muted mb-4">
                        Fresh CRM is designed to get you up and running quickly.
                        No complex configuration, no technical jargon.
                    </p>

                    <div class="position-relative pl-4">
                        <div class="timeline-line"></div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center">
                                <div class="step-badge">1</div>
                                <h6 class="mb-0">Create your organisation</h6>
                            </div>
                            <p class="text-muted mt-2 mb-0">
                                Define your church or organisation profile, units and basic settings.
                                You’ll get an admin login ready to go.
                            </p>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center">
                                <div class="step-badge">2</div>
                                <h6 class="mb-0">Import or add members</h6>
                            </div>
                            <p class="text-muted mt-2 mb-0">
                                Add members one by one or import from an existing spreadsheet.
                                Start segmenting people by unit, age group or status.
                            </p>
                        </div>

                        <div>
                            <div class="d-flex align-items-center">
                                <div class="step-badge">3</div>
                                <h6 class="mb-0">Start tracking & communicating</h6>
                            </div>
                            <p class="text-muted mt-2 mb-0">
                                Record attendance, log income, and send SMS for services, events
                                and follow-up — all from the same dashboard.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Stats / image -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="pricing-card h-100">
                                <div class="small text-muted mb-2">Attendance overview</div>
                                <div class="pricing-price mb-1">+18%</div>
                                <div class="text-muted mb-3">
                                    average increase in tracked attendance after 3 months.
                                </div>
                                <ul class="pricing-list mb-0">
                                    <li><i class="fas fa-check-circle"></i>Weekly charts</li>
                                    <li><i class="fas fa-check-circle"></i>Export to JPG/PDF</li>
                                    <li><i class="fas fa-check-circle"></i>Share with leadership</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="testimonial-card h-100">
                                <div class="testimonial-badge">Customer quote</div>
                                <p class="testimonial-quote">
                                    “We moved from multiple Excel sheets to Fresh CRM and it completely
                                    changed how we see our people, attendance and finances.”
                                </p>
                                <div class="testimonial-meta">
                                    Senior Pastor<br>
                                    <span class="text-gray-400">Fresh Fountain UK</span>
                                </div>
                                <div class="testimonial-orb"></div>
                            </div>
                        </div>
                    </div>

                    <div class="small text-muted text-center">
                        Screens shown are examples. Your dashboard reflects your real data.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PRICING -->
    <!--<section class="py-5" id="pricing">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-title">Simple pricing that grows with you</h2>
                <p class="section-subtitle mt-2">
                    Start on the free plan and upgrade only when you’re ready.
                    No setup fees, no long-term contracts.
                </p>
            </div>

            <div class="row justify-content-center"> -->
                <!-- Free -->
                <!--<div class="col-md-4 mb-4">
                    <div class="pricing-card">
                        <h5 class="mb-2">Free</h5>
                        <p class="text-muted mb-3">Perfect for trying Fresh CRM or smaller teams.</p>
                        <div class="pricing-price mb-2">£0 <span>/ month</span></div>
                        <ul class="pricing-list">
                            <li><i class="fas fa-check-circle"></i> Up to 100 members</li>
                            <li><i class="fas fa-check-circle"></i> Attendance tracking</li>
                            <li><i class="fas fa-check-circle"></i> Finance logging</li>
                            <li><i class="fas fa-check-circle"></i> Bulk SMS (pay per SMS)</li>
                        </ul>
                        <a href="{{ Route::has('login') && !Auth::check() ? route('login') : '#hero' }}"
                           class="btn btn-outline-primary btn-block">
                            Get started free
                        </a>
                    </div>
                </div> -->

                <!-- Standard (popular) -->
                <!-- <div class="col-md-4 mb-4">
                    <div class="pricing-card popular">
                        <div class="pricing-pill">Most popular</div>
                        <h5 class="mb-2">Standard</h5>
                        <p class="text-muted mb-3">For growing churches and organisations.</p>
                        <div class="pricing-price mb-2">£10 <span>/ month</span></div>
                        <ul class="pricing-list">
                            <li><i class="fas fa-check-circle"></i> Up to 500 members</li>
                            <li><i class="fas fa-check-circle"></i> Advanced SMS templates</li>
                            <li><i class="fas fa-check-circle"></i> Attendance & finance reports</li>
                            <li><i class="fas fa-check-circle"></i> Priority email support</li>
                        </ul>
                        <a href="{{ Route::has('login') && !Auth::check() ? route('login') : '#hero' }}"
                           class="btn btn-primary btn-block">
                            Choose Standard
                        </a>
                    </div>
                </div> -->

                <!-- Pro -->
                <!--<div class="col-md-4 mb-4">
                    <div class="pricing-card">
                        <h5 class="mb-2">Pro</h5>
                        <p class="text-muted mb-3">For multi-site or larger teams.</p>
                        <div class="pricing-price mb-2">£50 <span>/ month</span></div>
                        <ul class="pricing-list">
                            <li><i class="fas fa-check-circle"></i> Unlimited members</li>
                            <li><i class="fas fa-check-circle"></i> Multi-user roles & permissions</li>
                            <li><i class="fas fa-check-circle"></i> Advanced analytics</li>
                            <li><i class="fas fa-check-circle"></i> Priority onboarding support</li>
                        </ul>
                        <a href="{{ Route::has('login') && !Auth::check() ? route('login') : '#hero' }}"
                           class="btn btn-outline-primary btn-block">
                            Talk to us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- FAQ + CTA -->
    <section class="py-5" id="faq">
        <div class="container">
            <div class="row">
                <!-- FAQ -->
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <h2 class="section-title mb-3">Frequently asked questions</h2>
                    <p class="text-muted mb-4">
                        A few common questions about Fresh CRM. You can always reach out
                        if you need more detail.
                    </p>

                    <div class="faq-item">
                        <div class="faq-question">
                            <i class="fas fa-chevron-right"></i> Do I need any technical skills to use Fresh CRM?
                        </div>
                        <div class="faq-answer">
                            No. Fresh CRM is designed for non-technical users. If you can use email and
                            basic office tools, you can use Fresh CRM.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <i class="fas fa-chevron-right"></i> Can we export our data if we ever leave?
                        </div>
                        <div class="faq-answer">
                            Yes. You can export key data such as members and attendance whenever you need.
                            Your data always belongs to you.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <i class="fas fa-chevron-right"></i> How does SMS billing work?
                        </div>
                        <div class="faq-answer">
                            SMS messages are billed separately via your SMS gateway.
                            Fresh CRM passes messages to the gateway and records activity on your dashboard.
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">
                            <i class="fas fa-chevron-right"></i> Can multiple people use Fresh CRM at the same time?
                        </div>
                        <div class="faq-answer">
                            Yes. You can create logins for your admin, finance and follow-up teams
                            so they can work together securely.
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <!--<div class="col-lg-6">
                    <div class="cta-section">
                        <div class="row align-items-center">
                            <div class="col-md-7 mb-3 mb-md-0">
                                <h3 class="mb-3">Ready to see Fresh CRM in action?</h3>
                                <p class="mb-4">
                                    Start on the free tier, explore the dashboard and invite your team.
                                    You can upgrade or cancel at any time.
                                </p>
                                @if (Route::has('login') && !Auth::check())
                                    <a href="{{ route('login') }}" class="btn btn-light btn-lg">
                                        Start free today
                                    </a>
                                @else
                                    <a href="#hero" class="btn btn-light btn-lg">
                                        Go to dashboard
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-5 text-md-right">
                                <div class="small text-gray-300">
                                    <i class="fas fa-shield-alt mr-1"></i> Your data. Your members.
                                    <br>We simply help you stay organised.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-muted small">
                        No credit card required on the free plan.
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <div class="mb-2 mb-md-0">
                &copy; {{ date('Y') }} Fresh CRM. All rights reserved.
            </div>
            <div>
                <a href="#" class="footer-link mx-2">Privacy policy</a>
                <a href="#" class="footer-link mx-2">Terms</a>
                <a href="#" class="footer-link mx-2">Support</a>
            </div>
        </div>
    </footer>

    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Simple FAQ toggle
        document.querySelectorAll('.faq-question').forEach(function (q) {
            q.addEventListener('click', function () {
                var answer = this.nextElementSibling;
                var icon = this.querySelector('i');

                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-right');
                } else {
                    answer.style.display = 'block';
                    icon.classList.remove('fa-chevron-right');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });
    </script>
</body>
</html>
