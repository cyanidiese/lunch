(function() {
    'use strict';

    angular
        .module('lunchDirectives')
        .directive('lunchDimmer', DimmerDirective);


    function DimmerDirective(){
        return {
            restrict: 'A',
            link: link
        };

        function link($scope, elem, attr, ctrl) {
            $(elem).dimmer({
                on: 'hover',
                duration    : {
                    show : 200,
                    hide : 200
                }
            })
        }
    }

})();

