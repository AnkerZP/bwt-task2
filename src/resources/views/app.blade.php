<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Task #2</title>
        <script src="https://apis.google.com/js/platform.js" async defer>
            {lang: 'ru'}
        </script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="js/validator.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/form/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="js/form/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="js/form/bootstrap-formhelpers.min.js"></script>
        <script type="text/javascript" src="js/form/bootstrap-formhelpers-countries.js"></script>
        <script type="text/javascript" src="js/form/bootstrap-formhelpers-phone.js"></script>
        <script type="text/javascript" src="js/jquery_form.js"></script>
        <script type="text/javascript" src="js/datepicker.js"></script>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/datepicker.css" type="text/css">
        <style>
            #map {
                height: 400px;
                width: 100%;
            }
        </style>
    </head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Registration Form</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Main Page</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/members">All Members</a></li>
                </ul>
                @if (Auth::guest())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                @else
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="/login">Dashboard</a></li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>

    @yield('content')
    
</body>
</html>
