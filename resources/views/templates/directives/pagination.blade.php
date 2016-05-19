<div class="pagination-wrap">
<div class="ui pagination menu" ng-hide="(countNumberOfPages() < 2)">
  <a class="item" ng-repeat="page in getArrayOfPages()"
                  ng-class="(page == current) ? ' active ' : '' "
                  ng-click="setNewCurrentPage(page)">
    @{{ page }}
  </a>
</div>
</div>