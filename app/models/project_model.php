<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of project_model
 *
 * @author Andre Bonner <andre.s.bonner@gmail.com>
 */
class Project_Model extends Model {

    private $_setting;

    public function __construct() {
        global $REG;
        $this->_setting = $REG;
        //print 111;
        parent::__construct();
    }

    public function projects() {
        global $REG;
        $this->_setting = $REG;

        return json_encode(array(
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
                    'english'),
                'menus' => array(
                    array(
                        'title' => 'Projects',
                        'url' => '/project'
                    ),
                    array(
                        'title' => 'Issues',
                        'url' => '/issues'
                    ),
                    array(
                        'title' => 'Users',
                        'url' => '/user'
                    )
                )
            )
        ));
    }

    function create() {
        
    }

    function delete() {
        
    }

    function edit() {
        
    }
}