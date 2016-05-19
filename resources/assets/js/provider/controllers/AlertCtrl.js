(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('AlertCtrl', AlertCtrl);


    function AlertCtrl(){

        var vm = this;

        vm.page = 'alert';

    }

})();

