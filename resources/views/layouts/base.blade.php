<html>
<head>
    <title>

    </title>
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="/js/jquery-3.6.0.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="/js/materialize.min.js"></script>


    <style>
        .success{
            background-color: #559455;
            padding:10px;
            margin:15px;
            display: inline-block;
        }
        .error{
            background-color: #bd4e4e;
            padding:10px;
            margin:15px;
            display: inline-block;
        }
    </style>
    @yield('cssHere')


</head>
<body>




<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Soccer App</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html"><i class="material-icons">person</i>Player Profiles</a></li>
    <li><a href="badges.html"><i class="material-icons">groups</i>Clubs</a></li>
    <li><a href="/chat"><i class="material-icons">forum</i>Chat</a></li>
    <li><a href="mobile.html"><i class="material-icons">logout</i>Logout</a></li>
</ul>

@include('layouts.flash-message')


@yield('content')




<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });

</script>
@yield('scriptsHere')
</body>
</html>
