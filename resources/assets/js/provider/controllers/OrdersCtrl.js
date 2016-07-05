(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('OrdersCtrl', OrdersCtrl);

    OrdersCtrl.$inject = ['$scope'];

    function OrdersCtrl($scope){

        var vm = this;

        vm.page = 'orders';
    }

})();

