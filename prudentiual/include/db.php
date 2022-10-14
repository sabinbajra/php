<?
// Database Info...

// Local
$host = "localhost";
$user = "root";
$pass = "root";
$db	  = "prudential";

$ms = mysqli_connect($host, $user, $pass,$db);
if ( !$ms )
	{
	echo "Error connecting to database.\n";
	}
mysqli_select_db($db);
?>