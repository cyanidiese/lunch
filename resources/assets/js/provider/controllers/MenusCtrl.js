(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('MenusCtrl', MenusCtrl);

    MenusCtrl.$inject = ['$scope'];

    function MenusCtrl($scope){

        var vm = this;

        vm.page = 'menus';
    }

})();

