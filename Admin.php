<?php
//sql table 
global $wpdb;
//$sql = ("CREATE TABLE IF NOT EXISTS `wp_headercode` (`id` int(11) NOT NULL,`code` text NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
//$qry = mysql_query($sql);
//$wpdb->get_results( $sql, null );
//

if (!function_exists("GetSQLValueString")) {
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
	{
		$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

		$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

		switch ($theType) {
			case "text":
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				break;
			case "long":
			case "int":
				$theValue = ($theValue != "") ? intval($theValue) : "NULL";
				break;
			case "double":
				$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
				break;
			case "date":
				$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				break;
			case "defined":
				$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
				break;
		}
		return $theValue;
	}
}
if (isset($_POST['headcodes'])) {
	$codes = $_POST['headcodes'];

	update_option( 'headcodes', htmlentities(stripslashes($codes)), "yes" );
	echo '<div class="updated settings-error notice is-dismissible" id="setting-error-settings_updated"> 
<p><strong>Settings saved.</strong></p><button class="notice-dismiss" type="button"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
	
} 
	
	
?>
<form method="post" action="">        
<div class="wrap">
<h2 class="title">Add the code for Page-level ads here. (Anchor/Overlay Ads - Vignette Ads)</h2>
<p><label for="ping_sites">Paste the code copied from your Adsense Account. This code will be added inside head tags of your WordPress installation.</label></p>
<textarea class="large-text code" rows="5" name="headcodes" id="headcodes"><?php echo html_entity_decode(get_option('headcodes',htmlentities($my_default_value))); ?></textarea>
<p class="submit"><input type="submit" value="Save Changes" class="button button-primary" id="submit" name="submit"></p>
</div>
</form>
