<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hospital Management System | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.1.1-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bulma -->
    <link rel="stylesheet" href="{{asset('bulma/bulma.sass')}}">
    <link rel="stylesheet" href="{{asset('bulma/css/bulma.css')}}">

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/app-page.js')}}"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<nav class="navbar is-white has-shadow">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item brand-text" href="{{ route('main') }}" onmousedown="request()->routeIs('main')">
                <p>Hospice</p>
            </a>
        </div>
        <div class="navbar-burger burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="navMenu" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ route('main') }}">
                Home
            </a>
            <a class="navbar-item" href="{{ url('patients') }}">
                Patients
            </a>
            <a class="navbar-item" href="{{ url('appointments') }}">
                Appointments
            </a>
            <a class="navbar-item" href="{{ url('pharmacy') }}">
                Pharmacy
            </a>
            <a class="navbar-item" href="admin.html">
                Reports
            </a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <div class="container py-4">
                    <p class="has-text-primary"> {{ Auth::user()->name }} ({{ Auth::user()->user_type }}) </p>
                </div>
                <a class="navbar-link">Account</a>
                <div class="navbar-dropdown has-text-centered has-text-link">
                    <a class="navbar-item" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="navbar-item" href="{{ route('profile.show') }}">
                        <span class="icon">
                          <i class="fa fa-user-doctor" aria-hidden="true"></i>
                        </span>
                        &nbsp; Profile
                    </a>
                    <hr class="navbar-divider"/>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="navbar-item" href="{{ route('logout') }}">
                            <span class="icon">
                                <i class="fa fa-right-from-bracket" aria-hidden="true"></i>
                            </span>
                            &nbsp;Logout
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</nav>
<!-- END NAV -->
<div class="container">
    <div class="columns">
        <div class="column is-3 ">
            <aside class="menu is-hidden-mobile">
                <p class="menu-label">
                    General
                </p>
                <ul class="menu-list">
                    <li><a class="is-active">Dashboard</a></li>
                    <li><a href="{{ url('patients') }}">Patients</a></li>
                    <li><a>Other</a></li>
                </ul>
                <p class="menu-label">
                    Services
                </p>
                <ul class="menu-list">
                    <li><a href="{{ url('outpatient') }}">Outpatient</a></li>
                    <li><a href="{{ url('inpatient') }}">Inpatient</a></li>
                </ul>
                <p class="menu-label">
                    Past Medical History
                </p>
                <ul class="menu-list">
                    <li><a>Payments</a></li>
                    <li><a>Transfers</a></li>
                    <li><a>Balance</a></li>
                    <li><a>Reports</a></li>
                </ul>
            </aside>
        </div>
        <div class="column is-9">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{ route('main') }}">Home</a></li>
                    <li class="is-active"><a href="{{ url('patients') }}" aria-current="page">Patients</a></li>
                </ul>
            </nav>
            <section class="hero is-info welcome is-small">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Hello, Chilanga Hospice.
                        </h1>
                        <h2 class="subtitle">
                            Chilanga Hospice, Chilanga, Lusaka.
                        </h2>
                    </div>
                </div>
            </section>
            <section class="info-tiles">
                <div class="tile is-ancestor has-text-centered">
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">439k</p>
                            <p class="subtitle">Users</p>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">59k</p>
                            <p class="subtitle">Patients</p>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">3.4k</p>
                            <p class="subtitle">Appointments</p>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">19</p>
                            <p class="subtitle">Drug Pick-ups</p>
                        </article>
                    </div>
                </div>
            </section>
            <div class="columns">
                <div class="column is-6">
                    <div class="card events-card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Todays Appointments
                            </p>
                            <a href="#" class="card-header-icon" aria-label="more options">
                <span class="icon">
                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                            </a>
                        </header>
                        <div class="card-table">
                            <div class="content">
                                <table class="table is-fullwidth is-striped">
                                    <tbody>
                                    <tr>
                                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                                        <td>Lorum ipsum dolem aire</td>
                                        <td class="level-right"><a class="button is-small is-primary"
                                                                   href="#">Action</a></td>
                                    </tr>
                                    <tr>
                                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                                        <td>Lorum ipsum dolem aire</td>
                                        <td class="level-right"><a class="button is-small is-primary"
                                                                   href="#">Action</a></td>
                                    </tr>
                                    <tr>
                                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                                        <td>Lorum ipsum dolem aire</td>
                                        <td class="level-right"><a class="button is-small is-primary"
                                                                   href="#">Action</a></td>
                                    </tr>
                                    <tr>
                                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                                        <td>Lorum ipsum dolem aire</td>
                                        <td class="level-right"><a class="button is-small is-primary"
                                                                   href="#">Action</a></td>
                                    </tr>
                                    <tr>
                                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                                        <td>Lorum ipsum dolem aire</td>
                                        <td class="level-right"><a class="button is-small is-primary"
                                                                   href="#">Action</a></td>
                                    </tr>
                                    <tr>
                                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                                        <td>Lorum ipsum dolem aire</td>
                                        <td class="level-right"><a class="button is-small is-primary"
                                                                   href="#">Action</a></td>
                                    </tr>
                                    <tr>
                                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                                        <td>Lorum ipsum dolem aire</td>
                                        <td class="level-right"><a class="button is-small is-primary"
                                                                   href="#">Action</a></td>
                                    </tr>
                                    <tr>
                                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                                        <td>Lorum ipsum dolem aire</td>
                                        <td class="level-right"><a class="button is-small is-primary"
                                                                   href="#">Action</a></td>
                                    </tr>
                                    <tr>
                                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                                        <td>Lorum ipsum dolem aire</td>
                                        <td class="level-right"><a class="button is-small is-primary"
                                                                   href="#">Action</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="#" class="card-footer-item">View All</a>
                        </footer>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Patient Search
                            </p>
                            <a href="#" class="card-header-icon" aria-label="more options">
                <span class="icon">
                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-large" type="text" placeholder="">
                                    <span class="icon is-medium is-left">
                    <i class="fa fa-search"></i>
                  </span>
                                    <span class="icon is-medium is-right">
                    <i class="fa fa-check"></i>
                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                User Search
                            </p>
                            <a href="#" class="card-header-icon" aria-label="more options">
                <span class="icon">
                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-large" type="text" placeholder="">
                                    <span class="icon is-medium is-left">
                    <i class="fa fa-search"></i>
                  </span>
                                    <span class="icon is-medium is-right">
                    <i class="fa fa-check"></i>
                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
