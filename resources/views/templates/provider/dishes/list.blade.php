<lunch-menu
        special="provider"
        page="vm.page"
></lunch-menu>
<div class="ui bottom attached segment">
    <div class="ui horizontal divider">
        <h2>Dishes</h2>
    </div>

    <div ng-hide="vm.single_dish_view">

        <div class="ui menu">
            <a class="item" ng-click="vm.showCategory('all', 'active')"
               ng-class="(vm.current_category.active == 'all')?'active':''">
                All
                <div class="floating ui gray label">@{{ vm.categoryDishesCount('all', 1) }}</div>
            </a>
            <a class="item" ng-repeat="category in vm.categories"
               ng-class="(vm.current_category.active == category.id)?'active':''"
               ng-click="vm.showCategory(category.id, 'active')">
                @{{category.name}}
                <div class="floating ui gray label">@{{ vm.categoryDishesCount(category.id, 1) }}</div>
            </a>
            <div class="right item">
                <div class="ui action input">
                    <div class="ui button">Add Dish</div>
                </div>
            </div>
        </div>

        <div class="ui medium images dishes-list">
            <a class="ui medium image"
               ng-repeat="dish in vm.filtered_dishes.active" lunch-dish="dish" lunch-dimmer
               ng-click="vm.showSingleDish(dish)"
            ></a>
        </div>

        <lunch-pagination
                current="vm.current_pages.active"
                maximum="vm.dishes_per_page"
                total="vm.filtered_dishes_by_cat.active.length"
        ></lunch-pagination>

        <div class="ui horizontal divider">
            <h2>Removed Dishes</h2>
        </div>

        <div class="ui menu">
            <a class="item" ng-click="vm.showCategory('all', 'inactive')"
               ng-class="(vm.current_category.inactive == 'all')?'active':''">
                All
                <div class="floating ui gray label">@{{ vm.categoryDishesCount('all', 0) }}</div>
            </a>
            <a class="item" ng-repeat="category in vm.categories"
               ng-class="(vm.current_category.inactive == category.id)?'active':''"
               ng-click="vm.showCategory(category.id, 'inactive')">
                @{{category.name}}
                <div class="floating ui gray label">@{{ vm.categoryDishesCount(category.id, 0) }}</div>
            </a>
        </div>

        <div class="ui medium images dishes-list">
            <a class="ui medium image"
               ng-repeat="dish in vm.filtered_dishes.inactive" lunch-dish="dish" lunch-dimmer
               ng-click="vm.showSingleDish(dish)"
            ></a>
        </div>

        <lunch-pagination
                current="vm.current_pages.inactive"
                maximum="vm.dishes_per_page"
                total="vm.filtered_dishes_by_cat.inactive.length"
        ></lunch-pagination>

    </div>
    <div ng-show="vm.single_dish_view">
        <div class="ui grid">
            <div class="four wide column">
                <h2>@{{ vm.current_dish.name }}</h2>

                <table class="ui very basic celled table">
                    <thead>
                    <tr>
                        <td colspan="2">
                            <h3>@{{ vm.current_dish.cost | currency:"₴ ": 2}}</h3>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <b>Description</b><br>
                            @{{ vm.current_dish.description }}
                        </td>
                    </tr>
                    <tbody>
                    <tr>
                        <td>
                            <b>Weight</b>
                        </td>
                        <td>
                            <b>@{{ vm.current_dish.weight }} g</b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Calories</b>
                        </td>
                        <td>
                            <b>@{{ vm.current_dish.calories }} kcal</b>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="ui buttons">
                    <button class="ui button" ng-click="vm.removeSingleDish(vm.current_dish)"
                            ng-show="vm.current_dish.is_active">Remove</button>
                    <button class="ui button" ng-click="vm.restoreSingleDish(vm.current_dish)"
                            ng-hide="vm.current_dish.is_active">Restore</button>
                    <button class="ui button" ng-click="vm.editSingleDish(vm.current_dish)">Edit</button>
                </div>

            </div>
            <div class="twelve wide column">
                <img class="ui fluid image" ng-src="@{{ vm.current_dish.imageBig }}">
                <div class="ui top right attached label" ng-click="vm.hideSingleDish()" >&times;</div>
            </div>
        </div>
        @{{ vm.current_dish | json }}
    </div>
</div>