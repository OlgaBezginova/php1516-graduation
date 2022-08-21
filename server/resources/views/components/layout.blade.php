<x-main-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admins.edit', ['id' => auth()->user()->id]) }}">Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">@csrf<button type="submit">Logout</button></form>
                            </li>
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
                    <li{!! Route::currentRouteName() == 'home' ? ' class="active"' : '' !!}><a href="{{ route('home') }}">Statistics</a></li>
                    <li{!! Route::currentRouteName() == 'products.list' ? ' class="active"' : '' !!}><a href="{{ route('products.list') }}">Products</a></li>
                    <li{!! Route::currentRouteName() == 'orders.list' ? ' class="active"' : '' !!}><a href="{{ route('orders.list') }}">Orders</a></li>
                    <li{!! Route::currentRouteName() == 'admins.list' ? ' class="active"' : '' !!}><a href="{{ route('admins.list') }}">Admins</a></li>
                    <li{!! Route::currentRouteName() == 'users.list' ? ' class="active"' : '' !!}><a href="{{ route('users.list') }}">Users</a></li>
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
                            <div class="col-12">
                                <x-alert></x-alert>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                {{ $sidebar ?? ''  }}
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h1>{{ $h1 ?? 'Laravel Graduation' }}</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    {{ $slot }}
                                </div>
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
</x-main-layout>
