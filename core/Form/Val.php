<?php

/* * Val.php
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

class Val {

    public function __construct() {
        
    }

    public function minlength($data, $arg) {
        if (strlen($data) < $arg) {
            return "Your string must be $arg charaters long or more";
        }
    }

    public function maxlength($data, $arg) {
        if (strlen($data) > $arg) {
            return "Your string can only be $arg characters long";
        }
    }

    public function digit($data) {
        if (ctype_digit($data) == false) {
            return 'Your string must be a digit';
        }
    }

    public function __call($name, $arguments) {
        throw new Exception("$name does not exist inside of: " . __CLASS__);
    }

}
