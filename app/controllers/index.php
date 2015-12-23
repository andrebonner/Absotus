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
        Session::init();
        $logged = Session::get('loggedIn');
        if (!$logged) {
            header("Location: ./account/login",true);
            die();
        }
    }

    function index() {
        global $REG;
        $cfg = $REG;

        $this->view->title = 'Dashboard';
        $this->view->data = array('description' => 'This page is the index', 'cfg' => $this->cfg, 'user' => Session::get('user'));
        $this->view->css = array(
            'app/webroot/bootstrap/css/bootstrap.min.css',
            'app/views/index/css/dashboard.css');
        //$this->view->css = array('/index/css/carousel.css');
        $this->view->js = array(
            'app/webroot/bootstrap/js/jquery.min.js',
            'app/webroot/angular/angular.min.js',
            'app/views/index/js/dashboardApp.js',
            'app/views/index/js/mainCtrl.js',
            'app/webroot/bootstrap/js/bootstrap.min.js',
            'app/views/index/js/holder.js');
        echo "<!--" . strtoupper("Welcome to " . $this->view->data['cfg']->title) . "-->\n";
        //$this->view->render("header");
        $this->view->render("index/index");
        //$this->view->render("footer");
    }

    function get($id = 0) {
        $dashboard = array(
            'dashboard' => array(
                'projects' => array(
                    array(
                        'id' => '1',
                        'name' => 'door',
                        'description' => 'the sub woofer is greg',
                        'issues' => array(
                            array(
                                'id' => '1',
                                'description' =>
                                'yesterday',
                                'status' => 'sugar')
                        ),
                        'modifieddate' => '12/09/2015'
                    ),
                    array(
                        'id' => '2',
                        'name' => 'box',
                        'description' => 'chesse is a box',
                        'issues' => array(
                            array(
                                'id' => '2',
                                'description' =>
                                'yesterday',
                                'status' => 'sugar')
                        ),
                        'modifieddate' => '02/09/2015'
                    ),
                    array(
                        'id' => '3',
                        'name' => 'dealer',
                        'description' => 'mover the open',
                        'issues' => array(
                            array(
                                'id' => '3',
                                'description' => 'yesterday',
                                'status' => 'sugar')),
                        'modifieddate' => '03/05/2015'
                        ),
                ),
                'users' => array(
                    'frencch',
                    'spanish',
                    'english')
            )
        );
        echo json_encode($dashboard);
    }

}
