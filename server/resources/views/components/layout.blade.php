<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>{{ $h1 ?? 'Laravel Graduation' }}</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<!-- partial:index.partial.html -->
<nav class="mnb navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <i class="ic fa fa-bars"></i>
            </button>
            <div style="padding: 15px 0;">
                <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Draude Oba <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
            {{ $filters ?? '' }}
        </div>
    </div>
</nav>
<!--msb: main sidebar-->
<div class="msb" id="msb">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="brand-wrapper">
                <!-- Brand -->
                <div class="brand-name-wrapper">
                    <a class="navbar-brand" href="#">
                        A-Level PHP
                    </a>
                </div>
            </div>

        </div>
        <!-- Main Menu -->
        <div class="side-menu-container">
            <ul class="nav navbar-nav">
                <li><a href="#">Dashboard</a></li>
                <li class="active"><a href="#">Statistics</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Admins</a></li>
                <li><a href="#">Users</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
<!--main content wrapper-->
<div class="mcw">
    <!--navigation here-->
    <!--main content view-->
    <div class="cv">
        <div>
            <div class="inbox">
                <div class="inbox-sb"></div>
                <div class="inbox-bx container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            {{ $sidebar ?? ''  }}
                        </div>
                        <div class="col-md-10">
                            {{ $slot }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger mx-3">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- partial -->
<script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script  src="/js/script.js"></script>

</body>
</html>
