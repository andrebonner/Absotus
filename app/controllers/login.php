<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Login extends Controller {

    public $cfg;

    function __construct() {
        parent::__construct();
        //print "Index Page";
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged) {
            header('location: ../index.php', true);
            die();
        }
    }

    function index() {
       
        $data = $this->model->run();
        
        global $REG;
        $cfg = $REG;
        $this->view->title = 'Login';
        $this->view->data = array('description' => 'This page is the index', 'cfg' => $this->cfg, 'error' => $data);
        $this->view->css = array(
            'app/webroot/bootstrap/css/bootstrap.min.css',
            'app/webroot/toastr/css/toastr.css',
            'app/views/login/css/login-template.css');
        //$this->view->css = array('/index/css/carousel.css');
        $this->view->js = array(
            'app/webroot/bootstrap/js/jquery.min.js',
            'app/webroot/bootstrap/js/bootstrap.min.js',
            'app/webroot/toastr/js/toastr.js',
            'app/views/login/js/script.js');
        //echo "<!--" . strtoupper("Welcome to " . $this->view->data['cfg']->title) . "-->\n";
        //$this->view->render("header");
        $this->view->render("login/index");
        //$this->view->render("footer");
    }

    function run() {

        $data = $this->model->run();
        global $REG;
        $cfg = $REG;
        $this->view->title = 'Login';
        $this->view->data = array('description' => 'This page is the index', 'cfg' => $this->cfg, 'error' => $data);
        $this->view->css = array(
            'app/webroot/bootstrap/css/bootstrap.min.css',
            'app/webroot/toastr/css/toastr.css',
            'app/views/login/css/login-template.css');
        //$this->view->css = array('/index/css/carousel.css');
        $this->view->js = array(
            'app/webroot/bootstrap/js/jquery.min.js',
            'app/webroot/bootstrap/js/bootstrap.min.js',
            'app/webroot/toastr/js/toastr.js',
            'app/views/login/js/script.js');
        //echo "<!--" . strtoupper("Welcome to " . $this->view->data['cfg']->title) . "-->\n";
        //$this->view->render("header");
        $this->view->render("login/index");
        //$this->view->render("footer");
    }

    function logout() {
        Session::destroy();
        header("location: /login");
    }

}
