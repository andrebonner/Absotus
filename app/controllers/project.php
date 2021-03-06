<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of project
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Project extends Controller {

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

        $this->view->title = 'Projects';
        $this->view->data = array(
            'description' => 'This page is the index', 
            'cfg' => $this->cfg, 
            'user' => Session::get('user'));
        $this->view->css = array(
            'app/webroot/bootstrap/css/bootstrap.min.css',
            'app/webroot/toastr/css/toastr.css',
            'app/views/index/css/dashboard.css');
        
        $this->view->js = array(
            'app/webroot/bootstrap/js/jquery.min.js',
            'app/webroot/angular/angular.min.js',
            'app/webroot/angular/angular-route.min.js',
            'app/views/index/js/dashboardApp.js',
            'app/views/project/js/projectCtrl.js',
            'app/webroot/bootstrap/js/bootstrap.min.js',
            'app/webroot/toastr/js/toastr.js');
        echo "<!--" . strtoupper("Welcome to " . $this->view->data['cfg']->title) . "-->\n";
        $this->view->render("header");
        $this->view->render("project/index");
        $this->view->render("footer");
    }
    
    function get($id = 0) {
        
        echo $this->model->projects();
    }
    
    function create(){
        if($_SERVER['REQUEST_METHOD']=='POST') $res=$this->model->create();
    }
    
    function delete(){
        if($_SERVER['REQUEST_METHOD']=='POST') $res=$this->model->delete($id);
    }
    
    function edit($id){
        if($_SERVER['REQUEST_METHOD']=='POST') $res=$this->model->edit($id);
    }

}
