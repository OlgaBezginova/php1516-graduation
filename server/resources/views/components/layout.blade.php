<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Laravel Homework' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ route('home') }}"{!! Route::currentRouteName() == 'home' ? ' class="active"' : '' !!}>Home</a>
                </li>
                <li>
                    <a href="{{ route('users.list') }}"{!! Route::currentRouteName() == 'users.list' ? ' class="active"' : '' !!}>Users</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="intro-header" style="background-image: url({{ $background ?? '/img/home-bg.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="site-heading">
                    <h1>{{ $h1 ?? 'Laravel Homework' }}</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    {{ $slot }}
</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="copyright text-muted">Copyright &copy; A-Level PHP-Online {{ date('Y') }}</p>
            </div>
        </div>
    </div>
</footer>

</body>

</html>
