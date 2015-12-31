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
        //Session::init();
//        $logged = Session::get('loggedIn');
//        if (!$logged) {
//            //die('Account');
//            header("location: ../account/login", true);
//            die();
//        }
    }

    function changepasswordconfirmation() {
        Auth::handleLogin();

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            $data = $this->model->changepassword();

        global $REG;
        $cfg = $REG;

        $this->view->title = 'Change password confirmation';
        $this->view->data = array(
            'description' => 'This page is the change password confirmation',
            'cfg' => $this->cfg,
            'error' => $data);
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
        $this->view->render("account/_header");
        $this->view->render("account/changepasswordconfirmation");
        $this->view->render("account/_footer");
    }

    function changepassword() {
        Auth::handleLogin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            $data = $this->model->changepassword();

        global $REG;
        $cfg = $REG;

        $this->view->title = 'Change Password';
        $this->view->data = array(
            'description' => 'This page is the change password',
            'cfg' => $this->cfg,
            'error' => $data);
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
        $this->view->render("account/_header");
        $this->view->render("account/changepassword");
        $this->view->render("account/_footer");
    }

    function confirmemail() {
        Auth::handleLogin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            $data = $this->model->confirmemail();

        global $REG;
        $cfg = $REG;
        $this->view->title = 'Confirm Email';
        $this->view->data = array(
            'description' => 'This page is the confirm email',
            'cfg' => $this->cfg,
            'error' => $data);
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
        $this->view->render("account/_header");
        $this->view->render("account/confirmemail");
        $this->view->render("account/_footer");
    }

    function forgotpasswordconfirmation() {
        Auth::handleLogin();
        $data = $this->model->forgotpassword();

        global $REG;
        $cfg = $REG;
        $this->view->title = 'Forgot Password Confirmation';
        $this->view->data = array(
            'description' => 'This page is the forgot password confirmation',
            'cfg' => $this->cfg,
            'error' => $data);
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
        $this->view->render("account/_header");
        $this->view->render("account/forgotpasswordconfirmation");
        $this->view->render("account/_footer");
    }

    function forgotpassword() {
        Auth::handleLogin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            $data = $this->model->forgotpassword();

        global $REG;
        $cfg = $REG;
        $this->view->title = 'Forgot Password';
        $this->view->data = array(
            'description' => 'This page is the forgot password',
            'cfg' => $this->cfg,
            'error' => $data);
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
        $this->view->render("account/_header");
        $this->view->render("account/forgotpassword");
        $this->view->render("account/_footer");
    }

    function get($id = 0) {
        echo 'Account';
    }

    function login($return_url='') {
            
        global $REG;
        $cfg = $REG;
        
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged) {
            //die('Login');
            header("location: ".$this->cfg->url."index.php");
            die();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            $data = $this->model->login($return_url);

        
        $this->view->title = 'Login';
        $this->view->data = array(
            'description' => 'This page is the index',
            'cfg' => $this->cfg,
            'error' => $data);
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
        $this->view->render("account/_header");
        $this->view->render("account/login");
        $this->view->render("account/_footer");
    }

    function logout() {
        Session::destroy();
        if (isset($_COOKIE['absotus_user'])) {
            setcookie('absotus_user', '', time() + (86400 * 30), '/Absotus');
        }
        Auth::handleLogin();
    }

    function sendcode() {
        Auth::handleLogin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            $data = $this->model->sendcode();

        global $REG;
        $cfg = $REG;
        $this->view->title = 'Send Code';
        $this->view->data = array(
            'description' => 'This page is the send code',
            'cfg' => $this->cfg,
            'error' => $data);
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
        $this->view->render("account/_header");
        $this->view->render("account/sendcode");
        $this->view->render("account/_footer");
    }

    function verifycode() {
        Auth::handleLogin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            $data = $this->model->verifycode();

        global $REG;
        $cfg = $REG;
        $this->view->title = 'Verify Code';
        $this->view->data = array(
            'description' => 'This page is the verify code',
            'cfg' => $this->cfg,
            'error' => $data);
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
        $this->view->render("account/_header");
        $this->view->render("account/verifycode");
        $this->view->render("account/_footer");
    }

}
