<?php
define('LIB_PATH',	"./source/");
define('CONFIG_PATH',	"./config/");
define('LOCAL',	false);
$path_extra = dirname(dirname(__FILE__));
$path = ini_get('include_path');
$path = CONFIG_PATH . PATH_SEPARATOR 
		.	LIB_PATH . PATH_SEPARATOR
		.	$path_extra . PATH_SEPARATOR
		.	$path;
ini_set('include_path', $path);

function doIncludes() {

    require_once LOCAL ? "config.MySpace.local.php" :  "config.MySpace.php";
    
    require_once "MySpaceID/myspace.php";
}

function main(){
/*
    if (@$_SESSION['auth_state']!= "start"){
	echo "Out of sequence";
	exit;
    }
*/

    $oauth_verifier = @$_GET['oauth_verifier'];  //Dhruv - don't know what this does

    if(!isset($oauth_verifier)){
	echo("Error!  AccessToken() returned invalid response!");
	exit;
    }

    $ms = new MySpace(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_secret'], true, $oauth_verifier);
    /*Debug*/
    $fp = fopen('debug_callback', 'w+');
    fwrite($fp, 'request_token ' . $_SESSION['request_token'] . '\n');
    fwrite($fp, 'request_secret '. $_SESSION['request_secret'] . '\n');
    /*Debug - end*/ 
    try{
    $tok = $ms->getAccessToken();
    }catch (Exception $e){
        /* Debug */
        fwrite($fp, $e->getMessage());
       /*Debug - end */
       exit;
    }
    if (!is_string($tok->key)|| !is_string($tok->secret)) {
	error_log("Bad token from getAccesToken(): " .var_export($tok, TRUE));
	echo "ERROR! getAccesTOken get invalid response!";
	exit;
    }
    
    echo "Save the following texts in your wordpress plugin:\n";
    echo "Access Token : " . $tok->key;
    echo "Access Secret : ". $tok->secret;
}
session_start();
doIncludes();
main();
?>
