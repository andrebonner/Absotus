<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" ng-controller="projectController">
<!--    <h1 class="page-header">Dashboard <span ng-bind="'-'"></span></h1>-->
    <ng-view></ng-view>
    <a href="#/create">Add a Project</a>
    <h2 class="sub-header" ><span ng-bind="'Projects'"></span></h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><span ng-bind="'#'"></span></th>
                    <th><span ng-bind="'Project Name'"></span></th>
                    <th><span ng-bind="'Description'"></span></th>

                    <th><span ng-bind="'Modified Date'"></span></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="project in projects">
                    <td><span ng-bind="project.id"></span></td>
                    <td><a href="<?php echo $this->data['cfg']->url; ?>#/details/{{project.id}}"><span ng-bind="project.name"></span></a></td>
                    <td><span ng-bind="project.description"></span></td>

                    <td><span ng-bind="project.modifiedon | date:'EEEE, MMMM d, y'"></span></td>
                    <td><a href="#/edit/{{project.id}}"><span ng-bind="'Edit'"></span></a>&nbsp;<span ng-bind="'|'"></span>&nbsp;<a href="#/details/{{project.id}}"><span ng-bind="'Details'"></span></a>&nbsp;<span ng-bind="'|'"></span>&nbsp;<a href="#/delete/{{project.id}}"><span ng-bind="'Delete'"></span></a></td>
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