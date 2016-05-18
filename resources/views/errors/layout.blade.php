<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Master's Lunch - {{$title}}</title>

        <link href="{{ asset_url('/favicon.ico') }}" rel="shortcut icon">

        <!-- css -->
        @section('css')
        <link href="{{ asset_url('/assets/third-party/semantic-ui/css/semantic.min.css') }}" rel="stylesheet">
        <link href="{{ asset_url('/assets/css/fonts.css') }}" rel="stylesheet">
        <link href="{{ asset_url('/assets/css/auth.min.css') }}" rel="stylesheet">
        @show
        <!-- /css -->

        <!-- styles -->
        @yield('styles')
        <!-- /styles -->
    </head>
    <body>
        <!-- content -->
        <h1 class="master-lunch-text">master<span class="apostrophe">'</span>s lunch</h1>
        <div class="overlay-wall">
            <h1 class="master-lunch-text error-title">{{$title}}</h1>
        </div>
        <!-- /content -->

        <!-- js -->
        @section('js')
        @show
        <!-- /js -->

        @yield('scripts')
        <!-- /scripts -->
    </body>
</html>
