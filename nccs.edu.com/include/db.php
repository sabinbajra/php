<?
// Database Info...

/*
// Web
$host = "localhost";
$user = "ashishre_ashishr";
$pass = "asH$*!SH";
$db	  = "ashishre_nccscms";
*/

// Local
$host = "localhost";
$user = "root";
$pass = "sabin";
$db	  = "nccs_edu_db";

$ms = mysql_pconnect($host, $user, $pass);
if ( !$ms )
	{
	echo "Error connecting to database.\n";
	}

mysql_select_db($db);
?>