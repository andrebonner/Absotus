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
	public static function handleLogin(){
		@session_start();
		$logged = $_SESSION['loggedIn'];
		if($logged == false){
			session_destroy();
			header('Location: ../signin');
			exit;
		}
	}
}
