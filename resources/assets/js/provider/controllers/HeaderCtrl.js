(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('HeaderCtrl', HeaderCtrl);


    function HeaderCtrl($scope){
        $scope.data = {
            Colors: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"]
        };

        $scope.titlez = 'Cooombo';
    }

})();

