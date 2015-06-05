<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>USERS_APP- @yield('title')</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        
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
                                        <li><a href="/auth/logout">Log Out</a></li>
                                        <li><a href="/">{{ Auth::user()->username }}</a></li>
                                    @else
                                        <li><a href="/auth/signupPage">Sign Up</a></li>
                                        <li><a href="/auth/loginPage">Login</a></li>
                                        <li><a href="/city/new">Create city</a></li>
                                    @endif
                                </ul>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            @show
        @section('content')
        @show
    </body>
</html>

