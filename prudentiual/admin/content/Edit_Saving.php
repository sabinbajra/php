<?php
//this page included for the edit of the management
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
?>

<?
echo $_GET['id'];
include ("../include/db.php");
$query = "select * from tbl_savings where saving_id=$_GET[id]";
$result = mysql_query($query);
$mgmt = mysql_fetch_array($result);
?>
<?
if($_GET['id'] == 2)
{

}
else
{
?>

<form action="" method="get">

<table width="100%" border="0">
  <tr>
    <td colspan="2">Edit the Content: </td>
    </tr>
  <tr>
    <td width="57%">&nbsp;</td>
    <td width="43%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

<?
}
?>