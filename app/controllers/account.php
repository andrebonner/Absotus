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
        $logged = Session::get('loggedIn');
        if (!$logged) {
            header('location: login', true);
            die();
        }
    }

    function get() {
        echo 'Account';
    }

    function logout() {
        Session::destroy();
        header("location: login");
    }

}
