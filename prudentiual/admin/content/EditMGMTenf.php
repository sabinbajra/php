<?php 

if($MGMT == "Modify")
{

$rq = "SELECT name from tbl_mgmt where mgmt_id=".$_GET['id'];
		$re = mysql_query($rq);
		$show = @mysql_fetch_array($re);
		
	include ("../include/db.php");


$q = "UPDATE tbl_mgmt SET 
			Name='$_POST[name]',
			Post='$_POST[post]'
			WHERE mgmt_id = '$_GET[id]'";
			
		//  Run query
		$r = mysql_query($q); 		
		
				if($r)
				{
?>
		
		<br><center>
		<table width="70%" height="104" border="0" cellpadding="3" cellspacing="0" bgcolor="#F4F4F4" class="table">
			  <tr>
				<td height="10" class="text"></td>
			  </tr>		
			  <tr bgcolor="#FFFFFF">
				<td height="54" ><div align="center">Profile of <font color="#FF0000"><strong><?=$_POST['name'];?></strong></font> has been <font color="#FF0000"><strong>modified</strong></font> Succesfully!<p><input type="button" name="Submit" value="Ok" onClick="history.go(-2)" class="search_box1"></div></td>
			  </tr>
			</table></center><br>
			
<?
}
} //end of if($edit = modify)

//----------------------------------------------------------------------------
		
		
		if($MGMT == "Delete")
		{
		include ("../include/db.php");
		
		$rq = "SELECT Name from tbl_mgmt where mgmt_id=".$_GET['id'];
		$re = mysql_query($rq);
		$show = @mysql_fetch_array($re);
		
		
		
		
		$RemoveQuery = mysql_query("DELETE FROM tbl_mgmt WHERE mgmt_id = '$_GET[id]'");

				if($RemoveQuery)
				{
				?>
				<br>
				<center>
				<table width="50%" border="0" class="table">
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><font color="#FF0000"><strong><?= $show['Name'] ?></font></strong> has been <font color=\"#FF0000\"><strong>deleted</strong></font> from Database Succesfully!<p><input type="button" name="Submit" value="Ok" onClick="window.location='?adminID=Management'" class="search_box1">&nbsp;</td>
				  </tr>
				</table>

				
							
							</center>
							<br>
<?
				}//end of if
				
}//end of == else if($MGMT == "Delete")

?>

<?php
		
		
		if($MGMT == "Add")
		{
		
		$add = mysql_query("INSERT INTO tbl_mgmt (Name, Post) VALUES ('$_POST[name]', '$_POST[post]')");
?>
<center>
<table width="50%" border="0" class="table" >
 
  <tr>
    <td><img src="images/compose.gif" />: Adding Management.&nbsp;</td>
  </tr>
  
  <tr>
    <td><?
			 			if ($add) 
						{
							echo "<span> <font color=\"#FF0000\"><strong>".$_POST[name]."</strong></font> was successfully added !!! </span><br>";
						}
							else {
								echo "<span <font color=\"#FF0000\"><strong>".$_POST[name]."</strong></font> could not added !!! </span>";
						}
?>&nbsp;
	</td>
  </tr>
  
  <tr>
    <td><div align="right"><a href="?adminID=Management&amp;Edit=ADDmgmt">ADD other</a> | <a href="?adminID=Management">View</a> </div></td>
  </tr>
</table></center>

<? 
		}//enc of else if(add)
?>