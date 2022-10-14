<?php 

if($BOD == "Modify")
{

include ("../include/db.php");

$rq = "SELECT name from tbl_bod where bod_id=".$_GET['id'];
		$re = mysql_query($rq);
		$show = @mysql_fetch_array($re);
		
		
		//for image fiel 
		$base_dir='../image/bod';
		$path=$base_dir.'/';
					
					if($HTTP_POST_FILES['upload']['name'] != "" && isset($HTTP_POST_FILES["upload"]))
					{
					$fname=$HTTP_POST_FILES["upload"]["name"];
	                $tname=$HTTP_POST_FILES["upload"]["tmp_name"];
	                
					
                    
						if(file_exists($base_dir."/".$fname)) {
						include "BoardError.php";
						}
							elseif(move_uploaded_file($tname, $base_dir."/".$fname)) 
							{
							$name = $fname;
							$add = @mysql_query("Update tbl_bod SET
									Name 		= '$_POST[names]',	 	
									IMG  		= '$name',	
									Post 		= '$_POST[post]',	
									Company 	= '$_POST[company]',	
									electfrom 	= '$_POST[efrom]' where bod_id='$_GET[id]'");
				
					
					?>

	
					
<center>
<table width="50%" border="0" class="table" >
 
  <tr>
    <td><img src="images/compose.gif" />: Modifying BOD.&nbsp;</td>
  </tr>
  
  <tr>
    <td>					

<?
echo "<span> <font color=\"#FF0000\"><strong>BOD :".$_POST[names]."</strong></font> was successfully Modified !!! </span><br>";

?>

&nbsp;
	</td>
  </tr>
  
  <tr>
    <td><div align="right"><a href="?adminID=BOD&Edit=ADDbod">ADD other</a> | <a href="?adminID=BOD">View</a><input type="button" name="Submit" value="Ok" onClick="history.go(-2)" class="search_box1"> </div></td>
  </tr>
</table></center>					
	
<?	
							}//end of else if
			}//end of if ($HTTP_POST_FILES['upload']['name'] != "" && isset($HTTP_PO
				else
				{
				include "Board1Error.php";
				}

} //end of if($edit = modify)

?>











<?
//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		
		
		if($BOD == "Delete")
		{
		include ("../include/db.php");
		
		$rq = "SELECT Name from tbl_bod where bod_id=".$_GET['id'];
		$re = mysql_query($rq);
		$show = @mysql_fetch_array($re);
		
		
		
		
		$RemoveQuery = mysql_query("DELETE FROM tbl_bod WHERE bod_id = '$_GET[id]'");

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
					<td><font color="#FF0000"><strong><?= $show['Name'] ?></font></strong> has been <font color=\"#FF0000\"><strong>deleted</strong></font> from Database Succesfully!<p><input type="button" name="Submit" value="Ok" onClick="window.location='?adminID=BOD'" class="search_box1">&nbsp;</td>
				  </tr>
				</table>

				
							
							</center>
							<br>
<?
				}//end of if
				
}//end of == else if($MGMT == "Delete")

?>












<?php
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
		//----------------------------------------------------------------------------
//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%		
		
		if($BOD == "Add")
		{
		?>
		
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style><?
		$base_dir='../image/bod';
		$path=$base_dir.'/';
		
		
		
		
		
		
		
			if($HTTP_POST_FILES['upload']['name'] != "" && isset($HTTP_POST_FILES["upload"]))
			{
			
			
				
					echo "<span class=\"text\">Upload Status...</span>";
                    $fname=$HTTP_POST_FILES["upload"]["name"];
	                $tname=$HTTP_POST_FILES["upload"]["tmp_name"];
	                
					// if($fname=="")continue;
                    
					if(file_exists($base_dir."/".$fname)) {
					echo "<br><span class=\"text\"><font color=\"#FF0000\"><strong>".$fname."</strong></font> could not be uploaded. File already exists!!! </span><br>";
					
					
					echo "<center><table width=50% border=0>
					  <tr>
						<td>";?><div align="right"><a href="?adminID=BOD&Edit=ADDbod">ADD other</a> | <a href="?adminID=BOD">View</a> <input type="submit" name="Submit2" value="Back <<" class="login_box"  onClick="javascript: history.back()" /></div></td>
					  </tr>
					</table></center>
					
					<?

					}//end of if(file_exists($base_dir."/".$fname)) 
					
					elseif(move_uploaded_file($tname, $base_dir."/".$fname)) {
					include ("../include/db.php");
					
					
						
					$name = $fname;
					$add = @mysql_query("INSERT INTO tbl_bod (Name,IMG,Post,Company,electfrom) VALUES ('$_POST[names]','$name', '$_POST[post]', '$_POST[company]','$_POST[efrom]')");
					
				
					echo mysql_error();
					?>	
					
					
<center>
<table width="50%" border="0" class="table" >
 
  <tr>
    <td><img src="images/compose.gif" />: Adding BOD.&nbsp;</td>
  </tr>
  
  <tr>
    <td>					
					
					
									
					<?
if ($add) 
{






	echo "<span> <font color=\"#FF0000\"><strong>BOD :".$_POST[names]."</strong></font> was successfully added !!! </span><br>";
}
					else {
							echo "<span <font color=\"#FF0000\"><strong>".$_POST[names]."</strong></font> could not added !!! </span>";
						}
?>
&nbsp;
	</td>
  </tr>
  
  <tr>
    <td><div align="right"><a href="?adminID=BOD&Edit=ADDbod">ADD other</a> | <a href="?adminID=BOD">View</a> </div></td>
  </tr>
</table>


</center>

<?
	                } //end of else if
						
			}//end of if(HTTP_POsT_FILES....)
			
			
			else
			{
			?>
			<center>
			<table width="50%" border="0" class="table">
  <tr>
    <td>You must enter all inforamation! <span class="style1">(image might be missing X) </span></td>
  </tr>
  <tr>
    <td><label>
      <input type="submit" name="Submit2" value="Back <<" class="login_box"  onClick="javascript: history.back()" />
    </label></td>
  </tr>
</table>
</center>
<?

			}

?>

  

<? 

		}//enc of else if(add)
?>