<div class="ui top attached tabular menu">
    <a href="#/" class="item" ng-class="{'active': (current == 'orders')}">
        Orders
    </a>
    <a href="#/profile" class="item" ng-class="{'active': (current == 'profile')}">
        Profile
    </a>
    <a href="#/alert" class="item" ng-class="{'active': (current == 'alert')}">
        <i class="alarm outline icon"></i>
    </a>
    <div class="right menu">

        <a href="#/menus" class="item" ng-class="{'active': (current == 'menus')}">
            Menus
        </a>
        <a href="#/dishes" class="item" ng-class="{'active': (current == 'dishes')}">
            Dishes
        </a>
        <a href="{{route('logout')}}" class="item">
            <i class="sign out icon"></i>
        </a>
    </div>
</div>