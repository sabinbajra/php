<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}	
	
?> 

<?
include ("../include/db.php");

$query = "SELECT * FROM tbl_mgmt";
	$result = mysql_query($query);
	//$count 	= mysql_num_rows($result);
		
?>

<table width="100%" border="0">
  <tr>
    <td><div align="right"><a href="?adminID=Management&amp;Edit=ADDmgmt">Add New Management Personnel! </a></div></td>
  </tr>
</table>

<br>
<?

if($Edit=="MGMT" || $Edit=="EditMGMTenf" || $Edit=="ADDmgmt" )
{
 include $Edit.".php";
}

else
	{
?>

<table width="100%" border="0">
<tr bgcolor="<?php echo $color; ?>">
    <td><div align="left"><strong>Name</strong></div></td>
    <td><div align="left"><strong>Post</strong></div></td>
    <td>Edit</td>
    <td>Delete</td>
    <td>&nbsp;</td>
  </tr>
  
  <?php 
  while($mgmt = mysql_fetch_array($result))
  {
  					if ($alternate == "1") { 
						$color = "#FDFDF7"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#FFFFFF"; 
						$alternate = "1";
					}
  ?>
  
  
  <tr bgcolor="<?php echo $color; ?>">
    <td width="41%" ><?php echo  $mgmt['Name'] ?>&nbsp;</td>
  	<td width="44%"><?php echo  $mgmt['Post']?>&nbsp;</td>
    <td width="5%"><div align="center"><a href="?adminID=Management&Edit=MGMT&id=<?= $mgmt['mgmt_id'] ?>">
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a></div></td>
    
	<td width="5%"><div align="center">
	<a href="?adminID=Management&amp&Edit=EditMGMTenf&MGMT=Delete&id=<?=$mgmt['mgmt_id']?>">
	<img src="images/ico_delete.gif" width="19" height="19" border="0" title="Delete the record!" onclick="return confirm('Are you sure to delete this User?')"></a></div></td>
    <td width="5%">&nbsp;</td>
  
  </tr>
  
  
  <?php 
  }//end of while
  ?>
</table>
<?
}//end of else
?>
