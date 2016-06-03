(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('OrdersCtrl', OrdersCtrl);


    function OrdersCtrl($scope){
        $scope.data = {
            Colors: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"]
        }
    }

})();

