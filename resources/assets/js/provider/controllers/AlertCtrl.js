(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('AlertCtrl', AlertCtrl);


    function AlertCtrl($scope){
        $scope.data = {
            Colors: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"]
        }
    }

})();

