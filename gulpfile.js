var elixir = require('laravel-elixir');

elixir(function(mix)
{
    //mix.less([
    //    'reset.less',
    //    'styles.less',
    //    'provider.less',
    //    'media.less'
    //], 'public/assets/css/app.min.css')
    //    .less([
    //        'auth.less'
    //    ], 'public/assets/css/auth.min.css');

    mix
        .scripts([
            'directives/directives.js',
            'directives/PaginationDirective.js',
            'directives/MenuDirective.js',
            'directives/DimmerDirective.js'
        ], 'public/assets/js/directives.min.js')
        .scripts([
            'factories/factories.js',
            'factories/CategoriesFactory.js',
            'factories/DishesFactory.js'
        ], 'public/assets/js/factories.min.js')
        .scripts([
            'provider/app.js',
            'provider/controllers/OrdersCtrl.js',
            'provider/controllers/ProfileCtrl.js',
            'provider/controllers/AlertCtrl.js',
            'provider/controllers/MenusCtrl.js',
            'provider/controllers/DishesCtrl.js',
            'provider/routes.js'
    ], 'public/assets/js/provider.min.js')
        .scripts([
            'auth.js'
        ], 'public/assets/js/auth.min.js')
    ;
});
