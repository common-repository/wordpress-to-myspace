<?php

	//please register at http://developer.myspace.com for a CONSUMER_KEY
	define('CONSUMER_KEY', 'cf3e5f3b696c4165bca1cd2350028161');

	//please register at http://developer.myspace.com for a CONSUMER_SECRET
	define('CONSUMER_SECRET', '10dd34e385c8488eab7b2e55801170e6629035cb50c7470cba306e3cc8f0b7f1');

	/**
     * This is where the example will store its OpenID information.
     * You should change this path if you want the example store to be
     * created elsewhere.  After you're done playing with the example
     * script, you'll have to remove this directory manually.
     */
	define('TEMP_STORE_PATH', "tmp/_php_consumer_test");

	/**
	 * map the following CONST to a proper file for your opperatin system/ enviroment
	 *
	 * "source/Auth/OpenID/CryptUtil.php"
	 *
	 * define('Auth_OpenID_RAND_SOURCE', 'C:\_net_capture\001.pcap');
	 */
?>