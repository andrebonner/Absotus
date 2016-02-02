<?php

/*
 * To change this license header, choose License Headers in Issue Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of issue_model
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Issue_Model extends Model {

    private $_setting;

    public function __construct() {
        global $REG;
        $this->_setting = $REG;
        //print 111;
        parent::__construct();
    }

    public function issues() {
        global $REG;
        $this->_setting = $REG;

        $user = Session::get('user');
        $userid = $user['id'];
        
        $sth = $this->db->prepare("SELECT i.issue_id AS issue_id, i.issue_title AS issue_title, i.issue_description AS issue_description, i.issue_createdon AS issue_createdon, p.name AS project_name FROM issues AS i JOIN projects AS p ON p.id=i.project_id JOIN projectaccess AS pa ON pa.project_id=p.id WHERE pa.user_id =".$userid." LIMIT 10");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        //print'<pre>';
        //print_r($data);
        //print'</pre>';
        
        return json_encode($data);
        /*return json_encode(array(
            'dashboard' => array(
                'issues' => array(
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
    
    public function projects() {
        global $REG;
        $this->_setting = $REG;

        $user = Session::get('user');
        $userid = $user['id'];
        
        $sth = $this->db->prepare("SELECT p.id AS id, p.name AS name FROM projects AS p JOIN projectaccess AS pa ON pa.project_id=p.id WHERE pa.user_id = ". $userid ." LIMIT 10");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        //print'<pre>';
        //print_r($data);
        //print'</pre>';
        
        return json_encode($data);
        /*return json_encode(array(
            'dashboard' => array(
                'issues' => array(
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
    
    public function types() {
        global $REG;
        $this->_setting = $REG;

        $sth = $this->db->prepare("SELECT issue_status_id, issue_status_type FROM issuestatus LIMIT 10");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        //print'<pre>';
        //print_r($data);
        //print'</pre>';
        
        return json_encode($data);
        /*return json_encode(array(
            'dashboard' => array(
                'issues' => array(
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
    
    public function priorities() {
        global $REG;
        $this->_setting = $REG;

        $sth = $this->db->prepare("SELECT issue_priority_id, issue_priority_type FROM issuepriority LIMIT 10");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        //print'<pre>';
        //print_r($data);
        //print'</pre>';
        
        return json_encode($data);
        /*return json_encode(array(
            'dashboard' => array(
                'issues' => array(
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

            $form->post('projects')
                    ->post('name')
                    ->val('minlength', 6)
                    ->post('description')
                    ->val('minlength', 6)
                    ->post('type')
                    ->post('priority');

            $form->submit();
            //echo 'Form passed';
            $postf = $form->fetch();
            
            $sth = $this->db->prepare("INSERT INTO issues(issue_title, issue_description, issue_type, issue_priority, issue_createdby, issue_createdon, project_id) VALUES (:title, :description, :type, :priority, :user, NOW(), :project_id)");
            $sth->bindValue(':title', $postf['title']);
            $sth->bindValue(':description', $postf['description']);
            $sth->bindValue(':type', $postf['type']);
            $sth->bindValue(':priority', $postf['priority']);
            $sth->bindValue(':createdby', $userid);
            $sth->bindValue(':project_id', $postf['projects']);
            echo $res = $sth->execute();
            
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
            
            echo "DELETE FROM issues WHERE id=".$id;
            $sth = $this->db->prepare("DELETE FROM issues WHERE id=:id");
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

            $form->post('projects')
                    ->post('name')
                    ->val('minlength', 6)
                    ->post('description')
                    ->val('minlength', 6)
                    ->post('type')
                    ->post('priority');
            
            $form->submit();
            //echo 'Form passed';
            $postf = $form->fetch();
            
            $id=$postf['id']>0 ? $postf['id']: $id;
            
            echo "UPDATE issues SET issue_title='".$postf['title']."', issue_description='".$postf['description']."', issue_type=".$postf['type'].", issue_priority=".$postf['priority'].", issue_resolutionsummary=".$postf['resolution'].", project_id=".$postf['projects']." WHERE id=".$id;
            $sth = $this->db->prepare("UPDATE issues SET name=:name, description=:description, issue_type=:type, issue_priority=:priority, issue_resolutionsummary=:resolution, project_id=:project_id WHERE id=:id");
            $sth->bindValue(':title', $postf['title']);
            $sth->bindValue(':description', $postf['description']);
            $sth->bindValue(':type', $postf['type']);
            $sth->bindValue(':priority', $postf['priority']);
            $sth->bindValue(':resolution', $postf['resolution']);
            $sth->bindValue(':id', $id);
            $res = $sth->execute();
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
