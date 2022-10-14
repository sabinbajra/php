<?
// Database Info...

// Local
$host = "localhost";
$user = "root";
$pass = "sabin";
$db	  = "nba_db";

$ms = mysql_pconnect($host, $user, $pass);
if ( !$ms )
	{
	echo "Error connecting to database.\n";
	}

mysql_select_db($db);
?>