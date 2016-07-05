(function() {
    'use strict';

    angular
        .module('lunchDirectives')
        .directive('lunchMenu', MenuDirective);


    function MenuDirective(){
        return {
            restrict: 'EA',
            scope: {
                special: '=',
                page: '='
            },
            templateUrl: app_templates.directives.menu,
            replace: true,
            link: function($scope, elem, attr, ctrl) {

                $scope.menuType = function(){
                    return $scope.special
                };

            }
        };
    }

})();

