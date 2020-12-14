<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINI POS SYSTEM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        table {
            counter-reset: tableCount;     
        }
        .counterCell:before {              
            content: counter(tableCount); 
            counter-increment: tableCount; 
        }
        /* .body_background {
            background-image: url('/image/canteen1.jpg');
            background-repeat: no-repeat;
        }
        .body_color {
            background-color: rgb(191, 191, 191);
        }
        .div-transparent {
            background: rgba(255, 255, 255, 0.8);
        } */
    </style>
</head>
<body class="body_background">
    <nav class="navbar navbar-expand-md bg-light navbar-light">
     <!-- Brand -->
        <a class="navbar-brand" href="#">$MINIPOSSYSTEM</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            @if($is_login)
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders') }}">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products') }}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('report') }}">Report</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Hello {{ $user->first_name }}
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>  
                </ul>
            @else
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-address-book"></i> REGISTER</a>
                    </li>
                </ul>
            @endif
        </div>
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>