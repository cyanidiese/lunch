<!DOCTYPE html>
<html lang="en" ng-app="{{$page}}LunchApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Master's Lunch | {{strtoupper($page)}}</title>

    <link href="{{ asset_url('/favicon.ico') }}" rel="shortcut icon">

    <!-- css -->
    @section('css')
        <link href="{{ asset_url('/assets/third-party/semantic-ui/css/semantic.min.css') }}" rel="stylesheet">
        <link href="{{ asset_url('/assets/third-party/semantic-ui-daterangepicker/css/daterangepicker.min.css') }}"
              rel="stylesheet">
        <link href="{{ asset_url('/assets/css/app.min.css') }}" rel="stylesheet">
@show
<!-- /css -->

    <!-- styles -->
@yield('styles')
<!-- /styles -->
</head>
<body>

<section class="content">
    <div class="ui container">
        <div ng-view></div>
    </div>
</section>

<!-- js -->
@section('js')

    <script type="text/javascript">

        var app_templates = {
            admin: {},
            master: {},
            provider: {
                orders: '{{route('provider.views.orders.list')}}',
                profile: '{{route('provider.views.profile.info')}}',
                alert: '{{route('provider.views.alert.form')}}',
                menus: '{{route('provider.views.menus.list')}}',
                dishes: '{{route('provider.views.dishes.list')}}'
            },
            factories: {
                dishes: '{{route('factories.dishes.list')}}',
                categories: '{{route('factories.categories.list')}}'
            },
            directives: {
                pagination: '{{route('directives.pagination')}}',
                menu: '{{route('directives.menu')}}'
            }
        };

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-route.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-animate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-resource.js"></script>

    <script src="{{ asset_url('/assets/third-party/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset_url('/assets/third-party/semantic-ui/js/semantic.min.js') }}"></script>

    <script src="{{ asset_url('/assets/js/factories.min.js') }}"></script>
    <script src="{{ asset_url('/assets/js/directives.min.js') }}"></script>
    <script src="{{ asset_url('/assets/js/'.$page.'.min.js') }}"></script>
@show
<!-- /js -->

<!-- scripts -->

@yield('scripts')
<!-- /scripts -->
</body>
</html>
