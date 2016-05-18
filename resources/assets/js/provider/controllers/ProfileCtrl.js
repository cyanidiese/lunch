(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('ProfileCtrl', ProfileCtrl);


    function ProfileCtrl($scope){
        $scope.data = {
            Colors: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"]
        }
    }

})();

