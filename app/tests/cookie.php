<?php
$arr1 = array('a','about');
setcookie('absotus_test', json_encode($arr1), time() + (86400 * 30), '/');
