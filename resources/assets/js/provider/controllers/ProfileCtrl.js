(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('ProfileCtrl', ProfileCtrl);


    function ProfileCtrl($scope){

        var vm = this;

        vm.page = 'profile';
    }

})();

