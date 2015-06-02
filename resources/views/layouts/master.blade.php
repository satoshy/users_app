<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <meta content="authenticity_token" name="csrf-param">
        <title>USERS_APP- @yield('title')</title>
        

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    </head>
    <body>
        @section('sidebar')
            <div class="page">
                <div class="container-fluid">
                    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="/">USERS_APP</a>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="/user/index">USERS</a></li>
                                    @if (Auth::check())
                                    <li><a href="/logout">Log Out</a></li>
                                    <li><a href="/profile">{{ Auth::user()->username }}</a></li>
                                    <li><a href="/user/logout">Logout</a></li>
                                    @else
                                    <li><a href="/user/signup">Sign Up</a></li>
                                    <li><a href="/user/loginPage">Login</a></li>
                                    @endif
                                </ul>

                            </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
        @show

        @section('content')
    
        @show
    </body>
</html>

