<?php
/**Language.php
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


class Language{
	var $availLang;
	function __construct(){
		// print 'Language';
		global $REG;
		$this->cfg = $REG;
		// scan language directory for all available
		$dh = opendir($this->cfg->root.'/app/language');
		while(false !== ($entry = readdir($dh))){
			if($entry != '.' && $entry != '..')
				$dir[] = $entry;
		}
		sort($dir);
		$this->availLang = $dir;
	}
	
	function botLangDetect($str='',$envType=''){
		// detect current language setting
		$availLang = $this->availLang;
		
		for($c=0; count($availLang)>$c; $c++){
			if(($envType == 1 && ereg('^(' . $availLang[$c] . ')(;q=[0-9]\\.[0-9])?$', $str)) || ($envType == 2 && ereg('(\(|\[|;[[:space:]])(' . $availLang[$c] . ')(;|\]|\))', $str))){
				$lang = $availLang[$c];
				return $lang;
			}
		}
	}
	
	function getLangPath($template){
		if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    		$HTTP_ACCEPT_LANGUAGE = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

		if (!empty($_SERVER['HTTP_USER_AGENT']))
	    	$HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
	
		// Accept Language
		if (empty($lang) && !empty($HTTP_ACCEPT_LANGUAGE)) {
	    	$accepted    = explode(',', $HTTP_ACCEPT_LANGUAGE);
	    	$acceptedCnt = count($accepted);
	    	reset($accepted);
			
			for ($i = 0; $i < $acceptedCnt && empty($lang); $i++) {
				$lang = $this ->botLangDetect($accepted[$i], 1);
	    	}
		}
		
		// user agent
		if (empty($lang) && !empty($HTTP_USER_AGENT)) {
			$lang = $this ->botLangDetect($HTTP_USER_AGENT, 2);
		}
		
		// default settings
		if (empty($lang)) {
	    $lang = 'default';
		}

		// -- 
		$dirName = dirname($template);

		if (isset($dirName) && ($dirName == ".")) {
			$dirName = "";
		} else {
			$dirName .= "/";
		}
			
		$path = $this->cfg->root . '/app/language/'.$lang .'/'.$dirName.'lang_'.$lang.'_'.basename($template); 


		return $path;
	}
}