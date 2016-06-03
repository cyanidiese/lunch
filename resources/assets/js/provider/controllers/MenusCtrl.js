(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('MenusCtrl', MenusCtrl);


    function MenusCtrl($scope){
        $scope.data = {
            Colors: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"]
        }
    }

})();

