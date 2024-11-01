<?php
    /* 

      Plugin Name: Wordpress to MySpace Status Update 
      Plugin URI: http://freeyoursource.org/wordpress
      Description: This plugin updates your myspace status with your latest wordpress blog post. Go <a href="admin.php?page=wordpressmyspace_options">here</a> to configure this plugin. 
      Author: Dhruwat Bhagat
      Version: 0.2.1 
      Author URI: http://freeyoursource.org/wordpress

    */
    
   define('HOME_PATH', 		dirname(__FILE__));
   define('LIB_PATH', 		"./source/");
    global $table_prefix, $wp_version;
   // require_once(ABSPATH . WPINC . '/pluggable.php');
    require_once('updatestatusimpl.php');

    add_action('publish_post', 'updatestatus',5); 
    add_action('admin_menu', 'options_menu');
    function options_menu(){
       add_options_page('Wordpress to MySpace Options Manager', 'Wordpress to MySpace', 'manage_options','wordpressmyspace_options', 'wordpressmyspace_options');
    }
    function wordpressmyspace_options(){
            require_once('options_menu.php');
    }
   // add_submenu_page( 'options.php', 'Options', 'Wordpress to Myspace', 'manage_options', 'wordpressmyspace_options', 'wordpressmyspace_options');
    function updatestatus($postid){
       $post = get_post($postid);
	/* Saw it done in wordbook, but it makes good sense*/
       if ($post->post_password != '') {
		return null;
       }
       $title = get_the_title($postid);
       $blogurl = get_permalink($postid);
    //   $myspacestatus = 'has posted a new blog \''. $title .'\' at ' . $blogurl;
       $myspacestatus = createformattedstatus($title, $blogurl);
       debugwpmssu("myspacestatus", $myspacestatus);
       updatestatusimplnew($myspacestatus, get_option('W2M_access_token'),get_option('W2M_access_secret'));
    }  
    
    function createformattedstatus($title, $blogurl) {
      //  $urlencodedblogurl = urlencode($blogurl);
      //  $title = urlencode($title);
        $titlestring = '';
      //  $encodedurllength = strlen($urlencodedblogurl);
         $encodedurllength = 15;
  /*
        if(encodedurllength > 134){
             $urlencodedblogurl = '';
             $titlestring = urlencode('has posted a new blog \''). substr($title, 0 , 134) . urlencode('\'');             
        } else {
  */
            $titlelengthavailable = 160 - (26 + encodedurllength);
         //   $titlestring = urlencode('has posted a new blog \'').  substr($title, 0 , $titlelengthavailable) . urlencode('\' at ').  $urlencodedblogurl;
$titlestring = 'has posted a new blog \''.  substr($title, 0 , $titlelengthavailable) . '\' at '.  $blogurl;
            //debugwpmssu('titleprefix', 'has posted a new blog \''); 
      //  } 
        return $titlestring;
    }


    class WordpressMyspace{
        public static $MYSPACEID_APP_URL =  'http://freeyoursource.org/myspaceapps/wpmyspaceupdatestatus/updatestatus_01.php';
        public static $accesstoken_token = '';       
        public static $accesstoken_secret = '';
        public static $debugenabled = 0;
    }

    function debugwpmssu($varname, $value){
        if(!WordpressMyspace::$debugenabled)
           return;
        //$fp = fopen(LIB_PATH."debugwpmssun", "a");
$fp = fopen(dirname(__FILE__)."/debugwpmssu", "a");
$fp = fopen(dirname(__FILE__)."/debugwpmssun", "a");
        fwrite($fp, dirname(__FILE__));
      //  fwrite($fp, $varname. " = " . $value);
        fclose($fp);
    }
    
?>