=== Wordpress to MySpace ===
Tags: MySpace, crosspost
Contributors: unitedroad
Requires at least: 2.1
Tested up to: 2.9.2
Stable tag: none
Donate link: none

Wordpress to MySpace allows you to update your Myspace status with the title of your latest Wordpress blog post. 

== Description ==

When you publish a new Wordpress blog post, Wordpress to Myspace would use Myspace's REST API to post its title and URL to your Myspace profile status. 

== Installation ==

Drop wordpress-to-myspace directory into /wp-content/plugins/ and activate the plugin in the Wordpress admin area. 
After that, you have to go to http://freeyoursource.org/myspaceapps/wpmyspaceupdatestatus/ to get the Access token and Access secret. 
You will be prompted to login to myspace if you are not already logged in.  
Then enter the Access token and Access secret in the settings page. 

== Changelog ==

= 0.1 = 
Initial Release.

= 0.1.1 = 
This plugin broke as I changed the url to fetch the Myspace Oauth token and Oauth secret from. I have fixed this in this minor update.

= 0.2 =
You no longer need to copy the Access Token and secret to the source code. An administration screen is added to make the configuration part more convenient. 
This plugin no longer adds the ugly backslashes around the blog title in the MySpace status.

Upgrading from version 0.1* to versions 0.2 and above will replace the wpmyspaceupdate.php file where your Access Token and Access Secret are stored. 
Either save these somewhere before the upgrade or retrieve them again from the URL given in the installation section. Sorry for not mentioning this earlier. 

= 0.2.1 =
Fixed the css path for the admin screen. Status message now gets to use those two extra characters salvaged from backslashes in the 0.2 release.

== Contact ==

Please contact me at unitedronaldo[at]yahoo.com for any suggestions. This is a VERY early release so your suggestions will help me improve this plugin.
