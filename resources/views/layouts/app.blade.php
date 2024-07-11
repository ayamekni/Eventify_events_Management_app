<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images\ecology.png')}}" width="50" height="50" class="d-inline-block align-top" alt="Logo">
      Seeds Of Change
    </a>

    <!-- Navbar toggler for mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <!-- Home Page Link -->
        <li class="nav-item">
          <a>Home</a>
        </li>
        <!-- Articles Link -->
        <li class="nav-item">
          <a>Articles</a>
        </li>
        <!-- Create an Event Link -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('events.form') }}">Create an Event</a>
        </li>
        <!-- Browse Events Link -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('events.browse') }}">Browse Events</a>
        </li>
        <li class="nav-item">
          <a>Donate</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

    @yield('content')


    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2024 Seeds Of Change. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-right">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#">Terms of Service</a></li>
                    <li class="list-inline-item"><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>


