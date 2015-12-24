<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Account extends Controller {

    public $cfg;

    function __construct() {
        parent::__construct();
        //print "Index Page";
        Session::init();
//        $logged = Session::get('loggedIn');
//        if (!$logged) {
//            header("location: ./account/login");
//            die();
//        }
    }

    function get($id = 0) {
        echo 'Account';
    }

    function login() {
        if($_SERVER['REQUEST_METHOD']=='POST') $data = $this->model->login();

        global $REG;
        $cfg = $REG;
        $this->view->title = 'Login';
        $this->view->data = array('description' => 'This page is the index', 'cfg' => $this->cfg, 'error' => $data);
        $this->view->css = array(
            'app/webroot/bootstrap/css/bootstrap.min.css',
            'app/webroot/toastr/css/toastr.css',
            'app/views/account/css/login-template.css');
        //$this->view->css = array('/index/css/carousel.css');
        $this->view->js = array(
            'app/webroot/bootstrap/js/jquery.min.js',
            'app/webroot/bootstrap/js/bootstrap.min.js',
            'app/webroot/toastr/js/toastr.js',
            'app/views/account/js/login.js');
        //echo "<!--" . strtoupper("Welcome to " . $this->view->data['cfg']->title) . "-->\n";
        $this->view->render("account/header");
        $this->view->render("account/login");
        $this->view->render("account/footer");
    }

    function changepassword() {
        if($_SERVER['REQUEST_METHOD']=='POST') $data = $this->model->changepassword();

        global $REG;
        $cfg = $REG;
        
        $this->view->title = 'Change Password';
        $this->view->data = array('description' => 'This page is the change password', 'cfg' => $this->cfg, 'error' => $data);
        $this->view->css = array(
            'app/webroot/bootstrap/css/bootstrap.min.css',
            'app/webroot/toastr/css/toastr.css',
            'app/views/account/css/login-template.css');
        //$this->view->css = array('/index/css/carousel.css');
        $this->view->js = array(
            'app/webroot/bootstrap/js/jquery.min.js',
            'app/webroot/bootstrap/js/bootstrap.min.js',
            'app/webroot/toastr/js/toastr.js',
            'app/views/account/js/changepassword.js');
        //echo "<!--" . strtoupper("Welcome to " . $this->view->data['cfg']->title) . "-->\n";
        $this->view->render("account/header");
        $this->view->render("account/changepassword");
        $this->view->render("account/footer");
    }

    function verifycode() {
        
    }

    function sendcode() {
        
    }

    function confirmemail() {
        
    }

    function forgotpassword() {
        
    }

    function logout() {
        Session::destroy();
        header("location: ../index.php");
    }

}
