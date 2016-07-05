(function() {
    'use strict';

    angular
        .module('lunchDirectives')
        .directive('lunchDish', DishDirective);


    function DishDirective(){
        return {
            restrict: 'A',
            scope: {
                dish: '=lunchDish'
            },
            templateUrl: app_templates.directives.dish,
            replace: false,
            link: function($scope, elem, attr, ctrl) {


            }
        };
    }

})();

