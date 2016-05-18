(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .config(config);

    config.$inject = ['$routeProvider'];

    function config($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: app_templates.provider.orders,
                controller: 'OrdersCtrl',
                controllerAs: 'vm'
            }).
            when('/profile', {
                templateUrl: app_templates.provider.profile,
                controller: 'ProfileCtrl',
                controllerAs: 'vm'
            }).
            when('/alert', {
                templateUrl: app_templates.provider.alert,
                controller: 'AlertCtrl',
                controllerAs: 'vm'
            }).
            when('/menus', {
                templateUrl: app_templates.provider.menus,
                controller: 'MenusCtrl',
                controllerAs: 'vm'
            }).
            when('/dishes', {
                templateUrl: app_templates.provider.dishes,
                controller: 'DishesCtrl',
                controllerAs: 'vm'
            }).
            otherwise({
                redirectTo: '/'
            });
    }
})();

