(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('AlertCtrl', AlertCtrl);

    AlertCtrl.$inject = ['$scope'];

    function AlertCtrl($scope){

        var vm = this;

        vm.page = 'alert';
    }

})();

