<?php

// database info
$db_host         = "localhost";
$database        = "nccs_cms";
$db_user         = "root";
$db_pass         = "sabin";

// the date you are reading this
//$date = "01/02/2006";

//===================================================

$timeout=time()-600;
mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());

$q = mysql_query("SELECT id FROM online WHERE IP='$REMOTE_ADDR'") or die(mysql_error());
$ins = mysql_fetch_row($q);
if ($ins >0) {
	mysql_query("UPDATE online set time=UNIX_TIMESTAMP() WHERE IP like '$REMOTE_ADDR'") or die(mysql_error());
}
else {
mysql_query("INSERT INTO online (time,IP) VALUES (UNIX_TIMESTAMP(),'$REMOTE_ADDR')") or die(mysql_error()); 
}
mysql_query("DELETE FROM online WHERE time<$timeout") or die(mysql_error());

$q = mysql_query("SELECT id FROM online ORDER BY ID DESC") or die(mysql_error());
$online = mysql_num_rows($q);
$total = mysql_fetch_row($q);
mysql_close();

//echo "document.write();";
//if ($so ==1) {
	echo "$online";
	//else { echo "document.write('$online');"; }
//}
?>
