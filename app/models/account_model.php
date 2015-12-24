<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account_model
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Account_Model extends Model {

    private $_setting;

    public function __construct() {
        //print 111;
        parent::__construct();
    }

    public function changepassword() {
        global $REG;
        $this->_setting = $REG;
        try {
            //print_r($_SERVER); die();
            $form = new Form();

            $form->post('oldpassword')
                    ->val('minlength', 6)
                    ->post('newpassword')
                    ->val('minlength', 6)
                    ->post('retypepassword')
                    ->val('minlength', 6);

            $form->submit();
            //echo 'Form passed';
            $postf = $form->fetch();
            //print "<pre>";
            //print_r($postf);
            print $password = Hash::create('md5', $postf['newpassword'], $this->_setting->hash_pass_key);
            //print "</pre>";
            Session::init();
            $user = Session::get('user');
            $sth = $this->db->prepare("UPDATE users SET password =:newpassword WHERE id=:id AND password=:oldpassword");
            $sth->bindValue(':id', $user['id']);
            $sth->bindValue(':newpassword', $password);
            $sth->bindValue(':oldpassword', $user['password']);
            $res = $sth->execute();
            if ($res) {
                header('location: ../index.php', true);
                die();
            }else{
                return 'Password could not be changed';
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function login() {
        global $REG;
        $this->_setting = $REG;
        try {
            //print_r($_SERVER); die();
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
            
            $sth = $this->db->prepare("SELECT a.id, a.username, a.email, a.password, c.role FROM users a INNER JOIN user_roles b ON b.user_id = a.id INNER JOIN roles c ON b.user_role = c.id WHERE a.username =:username AND a.password =:password");
            $sth->bindValue(':username', $postf['email']);
            $sth->bindValue(':password', $password);
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
