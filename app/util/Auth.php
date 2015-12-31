<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Auth {

    // handle authentication
    public static function handleLogin() {
        global $REG;
        $cfg = $REG;
        Session::init();
        $logged = Session::get('loggedIn');
        if (!$logged || !isset($_COOKIE['absotus_user'])) {
            //die('Index');
            Session::destroy();
            header('location: ' . $cfg->url . 'account/login');
            exit;
        }
//        else{
//            die(Session::get('loggedIn'));
//        }
    }

    public static function rememberLogin($value) {
        if (boolval($value)) {
            Session::init();
            //die(Session::get('user'));            
            setcookie('absotus_user', json_encode(Session::get('user')), time() + (86400 * 30), '/');
        }
    }

}
