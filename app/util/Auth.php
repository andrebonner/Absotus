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
        if (!$logged) {
            //die('Index');
            Session::destroy();
            header('location: ' . $cfg->url . 'account/login', false);
            exit;
        }
    }

    public static function rememberLogin($value) {
        if (boolval($value)) {
            setcookie('absotus_user', $data, time() + (86400 * 30), "/");
        }
    }

}
