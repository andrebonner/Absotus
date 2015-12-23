<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html ng-app="dashboard">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo isset($this->title) ? $this->title : $this->data['cfg']->title; ?></title>
        <link rel="icon" href="app/webroot/bootstrap/images/favicon.ico">
        <?php foreach ($this->css as $css) { ?>
            <link rel="stylesheet" href="<?php echo $this->data['cfg']->url . $css; ?>" type="text/css"/>
        <?php } ?>

    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Absotus</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Settings</a></li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" title="<?php print_r($this->data['user']); ?>">Profile</a>
                            <ul class="dropdown-menu">
                                <li><a href="account/logout"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Logout</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Help</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Reports</a></li>
                        <li><a href="#">Analytics</a></li>
                        <li><a href="#">Export</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="">Nav item</a></li>
                        <li><a href="">Nav item again</a></li>
                        <li><a href="">One more nav</a></li>
                        <li><a href="">Another nav item</a></li>
                        <li><a href="">More navigation</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="">Nav item again</a></li>
                        <li><a href="">One more nav</a></li>
                        <li><a href="">Another nav item</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" ng-controller="mainController">
                    <h1 class="page-header">Dashboard {{4 + 5}}</h1>

                    <div class="row placeholders">
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <i class="glyphicon glyphicon-th" style="font-size: 100px"></i> 
                            <!--<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">-->
                            <h4>Projects</h4>
                            <span class="text-muted">{{data.projects.length}}</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <i class="glyphicon glyphicon-list" style="font-size: 100px"></i> 
                            <!--<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">-->
                            <h4>Issues</h4>
                            <span class="text-muted">{{data.projects.issues.length}}</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
<i class="glyphicon glyphicon-user" style="font-size: 100px"></i>                             
<!--<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">-->
                            <h4>Users</h4>
                            <span class="text-muted">{{data.users.length}}</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder" >
                            <i class="glyphicon glyphicon-dashboard" style="font-size: 100px"></i>                            
<!--<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">-->
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                    </div>

                    <h2 class="sub-header">{{title}}</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Description</th>
                                    <th>Issues</th>
                                    <th>Modified Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="project in data.projects">
                                    <td>{{project.id}}</td>
                                    <td>{{project.name}}</td>
                                    <td>{{project.description}}</td>
                                    <td>{{project.issues.length}}</td>
                                    <td>{{project.modifieddate}}</td>
                                </tr>
                    
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li><a href="#"><i class="glyphicon glyphicon-menu-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-menu-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($this->js as $js) { ?>
            <script src="<?php echo $this->data['cfg']->url . $js; ?>" type="text/javascript" ></script>
        <?php } ?>
    </body> 
</html>
