<link rel="stylesheet" href="<?php bloginfo('wpurl');?>/wp-content/plugins/wordpress-to-myspace/options_menu.css" type="text/css" /> 
<?php 
if($_REQUEST['submit']){
    update_W2M_options();
}
function update_W2M_options(){
    update_option('W2M_access_token',$_POST['W2M_access_token']);
    update_option('W2M_access_secret',$_POST['W2M_access_secret']);
}
?>

<div class="wrap">
<h2><?php _e('Wordpress to MySpace','wpmyspacestatus') ?></h2>
</div>
<div class="w2m-options-contents">
<br>
<div class="w2m-options-description">
<?php _e('Wordpress to Myspace uses Myspace\'s REST API to post title and URL of your blog to your Myspace profile status.'); ?>
</div>
<div class="w2m-options-description">
<?php _e('This plugin needs the Access Token and Access Secret. To get your token and secret, go to '); ?> <a href="http://freeyoursource.org/myspaceapps/wpmyspaceupdatestatus/">http://freeyoursource.org/myspaceapps/wpmyspaceupdatestatus/.</a>
<br>
<?php _e(' You will be asked to enter your MySpace credentials if you are not already logged in.'); ?>
<br>
<br>
<?php _e(' Then once you have obtained your token and secret, you have to enter them in the options area below.'); ?>
</div> 
<div class="w2m-options-table-header" ><?php _e("Wordpress to MySpace options") ?></div>
<br>
<form method="post">
<div class="w2m-options-table-row">
<table width="100%" cellpadding="0">
<tr>
<th align="left" valign="top"><?php _e('Wordpress to MySpace Access Token','wpmyspacestatus'); ?></th><td valign="top" align="left" rowspan="2"><input type="text" name="W2M_access_token" value="<?php echo get_option('W2M_access_token'); ?>"  width="100%" size="40"/></td>
</tr>
<tr>
<td align="left" valign="top"><?php _e('Enter the access token here'); ?></td>
</tr>
</table>
</div>
<br>
<div class="w2m-options-table-row">
<table width="100%" cellpadding="0">
<tr>
<th align="left" valign="top"><?php _e('Wordpress to MySpace Access Secret','wpmyspacestatus'); ?></th><td valign="top" align="left" rowspan="2"><input type="text" name="W2M_access_secret" value="<?php echo get_option('W2M_access_secret'); ?>" width="100%" size="40"/></td>
</tr>
<tr>
<td align="left" valign="top"><?php _e('Enter the access secret here'); ?></td>
</tr>
</table>
</div>
<br>
<input type="submit" name="submit" class="w2m-options-submit" value="<?php _e('Save'); ?>">
</form>
</div>