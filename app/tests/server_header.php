<?php

//header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK');
//header($_SERVER['SERVER_PROTOCOL'] . ' 301 Moved Permanently');
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
//header($_SERVER['SERVER_PROTOCOL'] . ' 500 internal server error');

echo 'Server Header';

$pattern = '/[0-9]/';
$mystring = 'pass123';

if(preg_match($pattern, $mystring)){
    echo '<p>Numbers</p>';
}