<?php

/* * Form.php
 *
 * This is the main web entry point for Predque.
 *
 * If you are reading this in your web browser, your server is probably
 * not configured correctly to run PHP applications!
 *
 * See the README, INSTALL, and UPGRADE files for basic setup instructions
 * and pointers to the online documentation.
 *
 * http://localhost/Absotus/
 *
 * ----------
 *
 * Copyright (C) 2001-2011 Andre Bonner and JREAM.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */


require 'Form/Val.php';

class Form {

    // immediate post item
    private $_currentItem = null;
    // stored post data
    private $_postData = array();
    // validator object
    private $_val = array();
    // form errors
    private $_error = array();

    public function __construct() {
         $this->_val = new Val();
    }

    public function post($field) {
        $this->_postData[$field] = $_POST[$field];
        $this->_currentItem = $field;

        return $this;
    }

    public function fetch($fieldName = false) {
        if ($fieldName) {
            if (isset($this->_postData[$fieldName]))
                return $this->_postData[$fieldName];
            else
                return false;
        }else {
            return $this->_postData;
        }
    }

    public function val($typeOfValidator, $arg = null) {
        if($_SERVER['REQUEST_METHOD']!='POST') return $this;
        if ($arg == null)
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem]);
        else
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_currentItem], $arg);

        if ($error)
            $this->_error[$this->_currentItem] = $error;

        return $this;
    }

    public function submit() {
        if (empty($this->_error)) {
            return true;
        } else {
            $str = '';
            foreach ($this->_error as $key => $value) {
                $str.=$key . '=>' . $value . "\n";
            }
            throw new Exception($str);
        }
    }

}
