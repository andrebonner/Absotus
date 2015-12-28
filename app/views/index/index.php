
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" ng-controller="mainController">
    <h1 class="page-header">Dashboard <span ng-bind="4 + 5"></span></h1>

    <div class="row placeholders">
        <div class="col-xs-6 col-sm-3 placeholder">
            <i class="glyphicon glyphicon-th" style="font-size: 100px"></i> 
            <!--<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">-->
            <h4>Projects</h4>
            <span class="text-muted"><span ng-bind="data.projects.length"></span></span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <i class="glyphicon glyphicon-list" style="font-size: 100px"></i> 
            <!--<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">-->
            <h4>Issues</h4>
            <span class="text-muted"><span ng-bind="projectIssues()"></span></span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder">
            <i class="glyphicon glyphicon-user" style="font-size: 100px"></i>                             
            <!--<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">-->
            <h4>Users</h4>
            <span class="text-muted"><span ng-bind="data.users.length"></span></span>
        </div>
        <div class="col-xs-6 col-sm-3 placeholder" >
            <i class="glyphicon glyphicon-dashboard" style="font-size: 100px"></i>                            
<!--<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">-->
            <h4>All</h4>
            <span class="text-muted"><span ng-bind="data.length"></span></span>
        </div>
    </div>

    <h2 class="sub-header" ><span ng-bind="title"></span></h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><span ng-bind="'#'"></span></th>
                    <th><span ng-bind="'Project Name'"></span></th>
                    <th><span ng-bind="'Description'"></span></th>
                    <th><span ng-bind="'Issues'"></span></th>
                    <th><span ng-bind="'Modified Date'"></span></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="project in data.projects">
                    <td><span ng-bind="project.id"></span></td>
                    <td><a href="<?php echo $this->data['cfg']->url; ?>#/project/details/{{project.id}}"><span ng-bind="project.name"></span></a></td>
                    <td><span ng-bind="project.description"></span></td>
                    <td><span class="badge" ng-bind="project.issues.length"></span></td>
                    <td><span ng-bind="project.modifieddate | date:'mmmm dd, yyyy'"></span></td>
                </tr>
            </tbody>
        </table>
        <ng-view></ng-view>
        <a href="project">View All Projects</a>

    </div>
</div>
