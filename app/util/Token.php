<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Token
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Token {

    public static function create($data) {
        global $REG;
        /* Create a part of token using secretKey and other stuff */
        $tokenGeneric = $REG->secret_key . $_SERVER["SERVER_NAME"];
        /* Encoding token */
        $token = Hash::create('sha256', $tokenGeneric . $data, $REG->hash_gen_key);
        
        return $token;
    }

    public static function check($receivedToken, $receivedData) {
        /* Recreate the generic part of token using secretKey and other stuff */
    $tokenGeneric = $REG->secret_key.$_SERVER["SERVER_NAME"];

    // We create a token which should match
    $token = hash('sha256', $tokenGeneric.$receivedData);   

    // We check if token is ok !
    if ($receivedToken != $token)
    {
        echo 'wrong Token !';
        return false;
    }

    list($tokenDate, $userData) = explode("_", $receivedData);
    // here we compare tokenDate with current time using VALIDITY_TIME to check if the token is expired
    // if token expired we return false

    // otherwise it's ok and we return a new token
    return createToken(time()."#".$userData);   
    }

}
