<lunch-menu
    special="provider"
    page="vm.page"
    ></lunch-menu>
<div class="ui bottom attached segment">
<div class="ui horizontal divider">
    <h2>Dishes</h2>
</div>

<div class="ui menu">
  <a class="item" ng-click="vm.showCategory('all', 'active')" ng-class="(vm.current_category.active == 'all')?'active':''">
    All
  </a>
  <a class="item" ng-repeat="category in vm.categories"
    ng-class="(vm.current_category.active == category.id)?'active':''"
    ng-click="vm.showCategory(category.id, 'active')">
    @{{category.name}}
  </a>
  <div class="right item">
      <div class="ui action input">
        <div class="ui button">Add Dish</div>
      </div>
  </div>
</div>


<div class="ui medium images dishes-list">
<a href="http://google.com" class="ui medium image" lunch-dimmer  ng-repeat="dish in vm.filtered_dishes.active">

<div class="ui inverted dimmer">
    <div class="content">
      <div class="center">
        <h5 class="ui header">Category</h5>
        <h2 class="ui header">View</h2>
      </div>
    </div>
  </div>

  <img ng-src="@{{ dish.imageSmall }}">
  <h5>@{{dish.name}}
  <span>@{{ dish.cost }} ₴
  <i>@{{ dish.calories }} / @{{ dish.weight }}</i>
  </span>
  </h5>
</a>
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
  <a class="item"  ng-click="vm.showCategory('all', 'inactive')"
  ng-class="(vm.current_category.inactive == 'all')?'active':''">
      All
    </a>
    <a class="item" ng-repeat="category in vm.categories"
    ng-class="(vm.current_category.inactive == category.id)?'active':''"
    ng-click="vm.showCategory(category.id, 'inactive')">
      @{{category.name}}
    </a>
</div>


<div class="ui medium images dishes-list">
<a href="http://google.com" class="ui medium image"  ng-repeat="dish in vm.filtered_dishes.inactive">
  <img ng-src="@{{ dish.imageSmall }}">
  <h5>@{{dish.name}}
  <span>@{{ dish.cost }} ₴
  <i>@{{ dish.calories }} / @{{ dish.weight }}</i>
  </span>
  </h5>
</a>
</div>

<lunch-pagination
    current="vm.current_pages.inactive"
    maximum="vm.dishes_per_page"
    total="vm.filtered_dishes_by_cat.inactive.length"
    ></lunch-pagination>
</div>