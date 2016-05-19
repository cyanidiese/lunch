(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('OrdersCtrl', OrdersCtrl);


    function OrdersCtrl($scope){

        var vm = this;

        vm.page = 'orders';
    }

})();

