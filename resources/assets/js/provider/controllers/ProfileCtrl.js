(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('ProfileCtrl', ProfileCtrl);

    ProfileCtrl.$inject = ['$scope'];

    function ProfileCtrl($scope){

        var vm = this;

        vm.page = 'profile';
    }

})();

