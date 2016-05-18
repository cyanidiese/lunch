(function() {
    'use strict';

    angular
        .module('lunchFactories')
        .factory('categories', categories);

    categories.$inject = ['$http'];

    function categories($http){
        return {
            getCategories: getCategories
        };

        function getCategories(){

            return $http.get(app_templates.factories.categories).then(function(response)
            {
                return response.data;
            });
        }
    }

})();

