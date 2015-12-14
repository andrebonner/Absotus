<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Login_Model extends Model {

    private $_setting;

    public function __construct() {
        //print 111;
        parent::__construct();
    }

    public function run() {
        global $REG;
        $this->_setting = $REG;
        try {
            $form = new Form();

            $form->post('email')
                    ->val('minlength', 3)
                    ->post('password')
                    ->val('minlength', 6)
                    ->post('remember');

            $form->submit();
            //echo 'Form passed';
            $postf = $form->fetch();

            print "<pre>";
            print_r($postf);
            print $password = Hash::create('md5', $postf['password'], $this->_setting->hash_pass_key);
            print "</pre>";

            $sth = $this->db->prepare("SELECT a.id, c.role FROM users a INNER JOIN user_roles b ON b.user_id = a.id INNER JOIN roles c ON b.user_role = c.id WHERE a.username =:username AND a.password =:password");
            $sth->bindValue(':username' , $postf['email']);
            $sth->bindValue(':password' , $password);
            $sth->execute();
            //$sth->execute(array(':username' => $postf['email'], ':password' => $password));

            $data = $sth->fetch();

            $count = $sth->rowCount();
            if ($count > 0) {
                // login
                Session::init();
                Session::set('user', $data);
                Session::set('loggedIn', true);
                if (isset($postf['remember'])) {
                    setcookie('absotus_user', $data, time() + (86400 * 30), "/");
                }
                header('location: ../index.php', true);
                die();
            } else {
                return 'Login could not be processed';
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
