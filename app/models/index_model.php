<?php

/*
 * Here comes the text of your license
 * Each line should be prefixed with  * 
 */

/**
 * Description of index_model
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Index_Model extends Model {

    private $_setting;

    public function __construct() {
        global $REG;
        $this->_setting = $REG;
        //print 111;
        parent::__construct();
    }
    
    public function dashboard(){
        global $REG;
        $this->_setting = $REG;

        $sth = $this->db->prepare("SELECT * FROM projects LIMIT 10");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        //print'<pre>';
        //print_r($data);
        //print'</pre>';
        
        $dashboard = array(
            'dashboard' => array(
                'projects' => array(
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
                ),
                'users' => array(
                    'frencch',
                    'spanish',
                    'english')
            )
        );
        return json_encode($dashboard);
        
    }
}
