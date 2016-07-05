<div class="ui inverted dimmer">
    <div class="content">
        <div class="center">
            <h5 class="ui header">@{{ dish.category_name }}</h5>
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