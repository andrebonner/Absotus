<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" ng-controller="userController">
<!--    <h1 class="page-header">Dashboard <span ng-bind="'-'"></span></h1>-->
    <ng-view></ng-view>
    <a href="#/create">Add a User</a>
    <h2 class="sub-header" ><span ng-bind="'Users'"></span></h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><span ng-bind="'#'"></span></th>
                    <th><span ng-bind="'User Name'"></span></th>
                    <th><span ng-bind="'Full Name'"></span></th>                    
                     <th><span ng-bind="'Role'"></span></th>
                    <th><span ng-bind="'Notify'"></span></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="user in users">
                    <td><span ng-bind="user.id"></span></td>
                    <td><a href="#/details/{{user.id}}"><span ng-bind="user.username"></span></a></td>
                    <td><a href="mailto:{{user.email}}"><span ng-bind="user.name"></span></a></td>                    
                    <td><span ng-bind="user.role"></span></td>
                    <td><input type="checkbox" name="notify[]" ng-checked="user.notify == 1 ? true:false;"/></td>
                    <td><a href="#/edit/{{user.id}}"><span ng-bind="'Edit'"></span></a>&nbsp;<span ng-bind="'|'"></span>&nbsp;<a href="#/details/{{user.id}}"><span ng-bind="'Details'"></span></a>&nbsp;<span ng-bind="'|'"></span>&nbsp;<a href="#/delete/{{user.id}}"><span ng-bind="'Delete'"></span></a></td>
                </tr>

            </tbody>
        </table>

        <ul class="pagination pull-right">
            <li class="disabled"><a href="#"><i class="glyphicon glyphicon-menu-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-menu-right"></i></a></li>
        </ul>
    </div>
</div>