(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('MenusCtrl', MenusCtrl);


    function MenusCtrl($scope){

        var vm = this;

        vm.page = 'menus';
    }

})();

