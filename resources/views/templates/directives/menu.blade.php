<div class="ui top attached tabular menu">
    <a href="#/" class="item" ng-class="(page == 'orders')?'active':''">
        Orders
    </a>
    <a href="#/profile" class="item" ng-class="(page == 'profile')?'active':''">
        Profile
    </a>
    <a href="#/alert" class="item" ng-class="(page == 'alert')?'active':''">
        <i class="alarm outline icon"></i>
    </a>
    <div class="right menu">
        <a href="#/menus" class="item" ng-class="(page == 'menus')?'active':''">
            Menus
        </a>
        <a href="#/dishes" class="item" ng-class="(page == 'dishes')?'active':''">
            Dishes
        </a>
        <a href="{{route('logout')}}" class="item">
            <i class="sign out icon"></i>
        </a>
    </div>
</div>