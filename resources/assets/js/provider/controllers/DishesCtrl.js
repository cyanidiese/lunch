(function() {
    'use strict';

    angular
        .module('providerLunchApp')
        .controller('DishesCtrl', DishesCtrl);


    DishesCtrl.$inject = ['$scope', 'dishes', 'categories'];

    function DishesCtrl($scope, dishes, categories){
        var vm = this;

        vm.page = 'dishes';

        vm.categories = [];
        vm.dishes = [];
        vm.filtered_dishes_by_cat = {
            active: [],
            inactive: []
        };
        vm.filtered_dishes = {
            active: [],
            inactive: []
        };
        vm.current_category = {
            active: 'all',
            inactive: 'all'
        };
        vm.current_pages = {
            active: 1,
            inactive: 1
        };
        vm.dishes_per_page = 8;
        vm.showCategory = showCategory;

        getCategories();
        getDishes();

        //##################################################

        function getCategories()
        {
            categories.getCategories().then(function(data)
            {
                vm.categories = data;
            });
        }

        function getDishes()
        {
            dishes.getDishes().then(function(data)
            {
                vm.dishes = data;
                filterDishes();
            });
        }

        function showCategory(category_id, type){
            vm.current_category[type] = category_id;
            vm.current_pages[type] = 1;
            filterDishes();
        }

        function filterDishes()
        {
            vm.filtered_dishes = {
                active: [],
                inactive: []
            };
            vm.filtered_dishes_by_cat = {
                active: [],
                inactive: []
            };
            angular.forEach(vm.dishes, function(dish) {
                var type = (dish.is_active)? 'active' : 'inactive',
                    in_current_category = (vm.current_category[type] == 'all' || dish.category_id == vm.current_category[type]);
                if(in_current_category) {
                    vm.filtered_dishes_by_cat[type].push(dish);
                }
            });
            angular.forEach(vm.filtered_dishes_by_cat, function(dishes, type) {
                var current_page = vm.current_pages[type],
                    begin = ((current_page - 1) * vm.dishes_per_page),
                    end = begin + vm.dishes_per_page;
                vm.filtered_dishes[type] = vm.filtered_dishes_by_cat[type].slice(begin, end);
            });

        }

        $scope.$watch('vm.current_pages.active + vm.current_pages.inactive + vm.dishes_per_page', function(current, original) {
            filterDishes();
        });
    }

})();

