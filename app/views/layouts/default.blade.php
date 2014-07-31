<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        @section('title')
         Bug tracking
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Nicolas Widart">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{{ asset('assets/css/main.css') }}}" rel="stylesheet">
</head>

<body>

<div id="wrap">
    @include('admin.layouts.navigation')
    <div class="container">
        @yield('content')
    </div> <!-- /container -->
    <div id="push"></div>
</div><!-- wrap -->


<hr/>
<div id="footer">
    <div class="container">
        <p class="muted credit"><small>Bug Tracking</small></p>
    </div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="{{{ asset('assets/js/laroute.js') }}}"></script>
<script src="{{{ asset('assets/js/main.js') }}}"></script>
</body>
</html>