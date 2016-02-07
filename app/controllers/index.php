<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Index extends Controller {

    public $cfg;

    function __construct() {
        parent::__construct();
        //print "Index Page";
        Auth::handleLogin();
        Auth::last_Activity();
    }

    function index() {
        global $REG;
        $cfg = $REG;

        $this->view->title = 'Dashboard';
        $this->view->data = array(
            'description' => 'This page is the index',
            'cfg' => $this->cfg,
            'user' => Session::get('user'));
        $this->view->css = array(
            'app/webroot/bootstrap/css/bootstrap.min.css',
            'app/views/index/css/dashboard.css');
        $this->view->js = array(
            'app/webroot/bootstrap/js/jquery.min.js',
            'app/webroot/angular/angular.min.js',
            'app/webroot/angular/angular-route.min.js',
            'app/views/index/js/dashboardApp.js',
            'app/views/index/js/mainCtrl.js',
            'app/webroot/bootstrap/js/bootstrap.min.js',
            'app/webroot/chartjs/Chart.min.js',
            'app/views/index/js/chart.js',
            'app/views/index/js/holder.js');
        echo "<!--" . strtoupper("Welcome to " . $this->view->data['cfg']->title) . "-->\n";
        $this->view->render("header");
        $this->view->render("index/index");
        $this->view->render("footer");
    }

    function get($obj = '',$id = 0) {
           
        switch ($obj){
            case 'users':
                echo $this->model->users();
                break;
            case 'issues':
                echo $this->model->issues();
                break;
            default:
        echo $this->model->projects();
        }
    }

}
