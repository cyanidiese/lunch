(function() {
    'use strict';

    angular
        .module('lunchFactories')
        .factory('dishes', dishes);

    dishes.$inject = ['$http'];

    function dishes($http){
        return {
            getDishes: getDishes,
            find: find
        };

        function getDishes(){

            return $http.get(app_templates.factories.dishes).then(function(response)
            {
                return response.data;
            });

        }
    }

})();

