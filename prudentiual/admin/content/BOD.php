<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}	
	
?> 

<?
include ("../include/db.php");

$query = "SELECT * FROM tbl_bod";
	$result = mysql_query($query);
	
		
?>

<table width="100%" border="0">
  <tr>
    <td><div align="right"><a href="?adminID=BOD&Edit=ADDbod">Add New Board OF Directors! </a></div></td>
  </tr>
</table>

<br>
<?

if($Edit=="board" || $Edit=="EditBODenf" || $Edit=="ADDbod" || $Edit == "Viewbod" || $Edit == "Board" )
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
    <td>View</td>
	<td>Edit</td>
    <td>Delete</td>
    
  </tr>
  
  <?php 
  while($bod = mysql_fetch_array($result))
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
    <td width="41%" ><?php echo  $bod['Name'] ?>&nbsp;</td>
  	<td width="41%"><?php echo  $bod['Post']?>&nbsp;</td>
	<td width="6%"><div align="center"><a href="?adminID=BOD&Edit=Viewbod&id=<?= $bod['bod_id'] ?>">
	<img src="images/ico_detail.gif" width="19" height="19" border="0" title="View Details"></a></div></td>
    
	
    <td width="6%"><div align="center"><a href="?adminID=BOD&Edit=Board&id=<?= $bod['bod_id'] ?>">									
	<img src="images/ico_edit.gif" width="19" height="19" border="0"></a></div></td>
    
	<td width="6%"><div align="center">
	<a href="?adminID=BOD&Edit=EditBODenf&BOD=Delete&id=<?= $bod['bod_id'] ?>">
	<img src="images/ico_delete.gif" width="19" height="19" border="0" title="Delete the record!" onclick="return confirm('Are you sure to delete this User?')"></a></div></td>
    
  </tr>
  
  
  <?php 
  }//end of while
  ?>
</table>
<?
}//end of else
?>
