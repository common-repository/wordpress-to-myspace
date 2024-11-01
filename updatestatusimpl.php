<?php 
   define('LIB_PATH', 		"./source/");
   define('CONFIG_PATH', 	"./config/");
   define('LOCAL', false);

//gets a base path to the project  the "3rd parent" directory
$path_extra = dirname(dirname(dirname(__FILE__)));
$path_extra_new1 = dirname(__FILE__) . "/source/";
$path_extra_new2 = dirname(__FILE__) . "/config/";



//gets the default include path(s)
$path = ini_get('include_path');

//lets add a few more default paths.
$path = CONFIG_PATH . PATH_SEPARATOR
		.	LIB_PATH . PATH_SEPARATOR
		.	$path_extra . PATH_SEPARATOR
                .       $path_extra_new1 . PATH_SEPARATOR
                .       $path_extra_new2 . PATH_SEPARATOR
		.	$path;

//sets the new path(s) for php
ini_set('include_path', $path);

require_once LOCAL ? "config.MySpace.local.php" : "config.MySpace.php";

//loads the myspaceid api sdk
require_once "MySpaceID/myspace.php";

function updatestatusimplnew($status, $access_token, $access_secret){
 $ms_key = CONSUMER_KEY;			//we get this from config.MySpace.php
 $ms_secret = CONSUMER_SECRET;
 $ms = new MySpace($ms_key, $ms_secret, $access_token, $access_secret);
 $userId = $ms->getCurrentUserId();
 $ms->updateStatus($userId, $status);
 //$ms->clearAppData($userId);
 }

?>