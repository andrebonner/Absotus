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
        $logged = Session::get('loggedIn');
        if (!$logged) {
//            print('<pre>');
//            print_r($_GET);
//            print('</pre>');
//            die();
            Session::destroy();
            if (isset($_GET['var'])) {
                header('location: ' . $REG->url . 'account/login//' . $_GET['var']);
            }else{
                header('location: ' . $REG->url . 'account/login');
            }
            exit;
        }
    }

    public static function last_Activity() {
        $current_time = $_SERVER['REQUEST_TIME'];
        /**
         * for a 30 minute timeout, specified in seconds
         */
        $timeout_duration = 1800;

        /**
         * Here we look for the user’s LAST_ACTIVITY timestamp. If
         * it’s set and indicates our $timeout_duration has passed, 
         * blow away any previous $_SESSION data and start a new one.
         */
        
        $last_activity = Session::get('last_activity');
        if (isset($last_activity) && ($current_time - $last_activity) > $timeout_duration) {
            Session::destroy();
        }

        /**
         * Finally, update LAST_ACTIVITY so that our timeout 
         * is based on it and not the user’s login time.
         */
        Session::set('last_activity', $current_time);
    }

    public static function rememberLogin($value) {
        if (boolval($value)) {
            //die(Session::get('user'));            
            setcookie('absotus_user', json_encode(Session::get('user')), time() + (86400 * 30), '/Absotus');
        }
    }

}
