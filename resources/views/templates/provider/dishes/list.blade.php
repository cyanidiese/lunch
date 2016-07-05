<lunch-menu
        special="provider"
        page="vm.page"
></lunch-menu>
<div class="ui bottom attached segment">
    <div class="ui horizontal divider">
        <h2>Dishes</h2>
    </div>

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
        <a class="ui medium image" ng-repeat="dish in vm.filtered_dishes.active" lunch-dish="dish" lunch-dimmer></a>
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
        <a class="ui medium image" ng-repeat="dish in vm.filtered_dishes.inactive" lunch-dish="dish" lunch-dimmer></a>
    </div>

    <lunch-pagination
            current="vm.current_pages.inactive"
            maximum="vm.dishes_per_page"
            total="vm.filtered_dishes_by_cat.inactive.length"
    ></lunch-pagination>
</div>