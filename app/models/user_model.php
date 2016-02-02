<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class User_Model extends Model {

    private $_setting;

    public function __construct() {
        global $REG;
        $this->_setting = $REG;
        //print 111;
        parent::__construct();
    }

    public function users() {
        global $REG;
        $this->_setting = $REG;

        $user = Session::get('user');
        $userid = $user['id'];
        
        $sth = $this->db->prepare("SELECT u.id AS id, u.username AS username, u.email AS email, up.name AS name, (SELECT r.role FROM roles AS r JOIN user_roles AS ur ON ur.user_role=r.id WHERE ur.user_id=u.id LIMIT 1) AS role, up.allowemailnotification AS notify FROM users AS u JOIN userprofile AS up ON up.user_id = u.id LIMIT 10");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        //print'<pre>';
        //print_r($data);
        //print'</pre>';
        
        return json_encode($data);
        /*return json_encode(array(
            'dashboard' => array(
                'users' => array(
                    array(
                        'id' => '1',
                        'name' => 'door',
                        'description' => 'the sub woofer is greg',
                        'issues' => array(
                            array(
                                'id' => '1',
                                'description' =>
                                'yesterday is today',
                                'status' => 'sugar'),
                            array(
                                'id' => '4',
                                'description' =>
                                'today is yesterday',
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
                                'today is yesterday',
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
                                'description' => 'tomorrow is yesterday',
                                'status' => 'sugar')
                        ),
                        'modifieddate' => '03/05/2015'
                    ),
                )
            )
        ));*/
    }

    public function roles() {
        global $REG;
        $this->_setting = $REG;

        $user = Session::get('user');
        $userid = $user['id'];
        
        $sth = $this->db->prepare("SELECT id,role FROM roles LIMIT 10");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        //print'<pre>';
        //print_r($data);
        //print'</pre>';
        
        return json_encode($data);
        /*return json_encode(array(
            'dashboard' => array(
                'users' => array(
                    array(
                        'id' => '1',
                        'name' => 'door',
                        'description' => 'the sub woofer is greg',
                        'issues' => array(
                            array(
                                'id' => '1',
                                'description' =>
                                'yesterday is today',
                                'status' => 'sugar'),
                            array(
                                'id' => '4',
                                'description' =>
                                'today is yesterday',
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
                                'today is yesterday',
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
                                'description' => 'tomorrow is yesterday',
                                'status' => 'sugar')
                        ),
                        'modifieddate' => '03/05/2015'
                    ),
                )
            )
        ));*/
    }
    
    function create() {
        global $REG;
        $this->_setting = $REG;
        try {
            //print_r($_SERVER); die();
            $form = new Form();

            $form->post('name')
                    ->val('minlength', 6)
                    ->post('description')
                    ->val('minlength', 6);

            $form->submit();
            //echo 'Form passed';
            $postf = $form->fetch();
            
            $user = Session::get('user');
            $userid = $user['id'];
            
            $sth = $this->db->prepare("INSERT INTO users(name, description, modifiedon) VALUES (:name, :description, NOW())");
            $sth->bindValue(':name', $postf['name']);
            $sth->bindValue(':description', $postf['description']);
            $res = $sth->execute();
            
            $sth = $this->db->prepare("INSERT INTO useraccess (user_id, user_id, accesstype) VALUES (:user_id, :userid, 0)");
            $sth->bindValue(':user_id', $this->db->lastInsertId());
            $sth->bindValue(':userid', $userid);
            $res = $sth->execute();
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function delete($id) {
        global $REG;
        $this->_setting = $REG;
        try {
            //print_r($_SERVER); die();
            $form = new Form();

            $form->post('id');

            $form->submit();
            //echo 'Form passed';
            $postf = $form->fetch();
            
            $id=$postf['id']>0 ? $postf['id']: $id;
            
            echo "DELETE FROM users WHERE id=".$id;
            $sth = $this->db->prepare("DELETE FROM users WHERE id=:id");
            $sth->bindValue(':id', $id);
            //$res = $sth->execute();
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function edit($id) {
        global $REG;
        $this->_setting = $REG;
        try {
            //print_r($_SERVER); die();
            $form = new Form();

            $form->post('id')
                    ->post('name')
                    ->val('minlength', 6)
                    ->post('description')
                    ->val('minlength', 6);

            $form->submit();
            //echo 'Form passed';
            $postf = $form->fetch();
            
            $id=$postf['id']>0 ? $postf['id']: $id;
            
            //echo "UPDATE users SET name='".$postf['name']."', description='".$postf['description']."', modifiedon=NOW() WHERE id=".$id;
            $sth = $this->db->prepare("UPDATE users SET name=:name, description=:description, modifiedon=NOW() WHERE id=:id");
            $sth->bindValue(':name', $postf['name']);
            $sth->bindValue(':description', $postf['description']);
            $sth->bindValue(':id', $id);
            $res = $sth->execute();
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
