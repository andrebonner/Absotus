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
                <div id="navbar" class="navbar-collapse collapse" ng-init='user =<?php print(json_encode($this->data['user'])); ?>'>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo $this->data['cfg']->url; ?>">Dashboard</a></li>
                        <li><a href="#/settings">Settings</a></li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" title='{{user.username}}' >Profile</a>
                            <ul class="dropdown-menu">
                                <li><a href="account/changepassword"><i class="glyphicon glyphicon-wrench"></i>&nbsp;Change Password</a></li>
                                <li><a href="account/logout"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Logout</a></li>
                            </ul>
                        </li>

                        <li><a href="#/help">Help</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search..." ng-model="search" />
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar" ng-controller="menuController">
                    <!--<ul class="nav nav-sidebar">
                        <li class="active"><a href="#">Overview </a></li>
                        <li><a href="#">Reports</a></li>
                        <li><a href="#">Analytics</a></li>
                        <li><a href="#">Export</a></li>
                    </ul>
                    <ul class="nav nav-sidebar" >
                       <li><a href="#/project">Projects</a></li>
                        <li><a href="#/issue">Issues</a></li>
                        <li><a href="#/user">Users</a></li>
                    </ul>-->
                    <ul class="nav nav-sidebar" >
                        <li ng-repeat="m in navside| filter: search"><a href="{{m.url}}"><span ng-bind="m.title"></span></a></li>
                    </ul>
                    <ul class="nav nav-sidebar" >
                        <li ng-repeat="m in menu| filter: search"><a href="{{m.url}}"><span ng-bind="m.title"></span></a>
                            <ul class="nav navbar-collapse">
                                <li ng-repeat="s in m.submenu"><a href="{{m.url + s.url}}"><span ng-bind="s.title"></span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>