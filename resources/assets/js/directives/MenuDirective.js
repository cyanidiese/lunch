(function () {
    'use strict';

    angular
        .module('lunchDirectives')
        .directive('lunchMenu', MenuDirective);


    function MenuDirective() {
        return {
            restrict: 'E',
            scope: {
                current: '='
            },
            templateUrl: app_templates.directives.menu,
            replace: true,
            link: function ($scope, elem, attr, ctrl) {

            }
        };
    }

})();

