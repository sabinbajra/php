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
		
		
		if($mem == "Delete")
		{
		include ("include/db.php");
		
		$rq = "SELECT fname,memno from tbl_member where idtbl_member=".$_GET['id'];
		$re = mysql_query($rq);
		$show = @mysql_fetch_array($re);
		$RemoveQuery = mysql_query("DELETE FROM tbl_member WHERE idtbl_member = '$_GET[id]'");
		$RemoveQuery1 = mysql_query("DELETE FROM tbl_validity WHERE memno = '$show[memno]'");
				if($RemoveQuery && $RemoveQuery1)
				{
				?>
				<br>
				<center>
				<table width="50%" border="0" class="table">
				  <tr>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td><font color="#FF0000"><strong><?= $show['fname'] ?></font></strong> has been <font color=\"#FF0000\"><strong>deleted</strong></font> from Database Succesfully!<p><input type="button" name="Submit" value="Ok" onClick="window.location='?AdminPageID=Member'" class="search_box1">&nbsp;</td>
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
		
		if($mem == "Add")
		{
		
		?>
		
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style><?
		$base_dir='image/member';
		$path=$base_dir.'/';
		
		include ("include/db.php");
		//for insertion need the validation!!
		$flag=1;
					
		
		if($HTTP_POST_FILES['upload']['name'] != "" && isset($HTTP_POST_FILES["upload"]))
			{
					echo "<span class=\"text\">Upload Status...</span>";
                    $ffname=$HTTP_POST_FILES["upload"]["name"];
	                $tname=$HTTP_POST_FILES["upload"]["tmp_name"];
					
	           }
					// if($fname=="")continue;
            
					
					
					if(file_exists($base_dir."/".$ffname) && $ffname!="") {
					echo "<br><span class=\"text\"><font color=\"#FF0000\"><strong>".$ffname."</strong></font>   File could not be uploaded. File already exists!!! </span><br>";
					?>
					
					<?
					$flag = 0;
  					} //end of if(file_exists($base_dir."/".$fname)) 
					
		
		if($flag == 1){
		move_uploaded_file($tname, $base_dir."/".$ffname);
		$add = mysql_query("INSERT INTO tbl_member (fname,mname,lname,address1,address2,phone1,phone2,mobile,dob,sex,firmname,designation,blood,passport,citizenship,memno,image) VALUES (
		'$_POST[firstname]',
		'$_POST[middlename]',
		'$_POST[lastname]',
		'$_POST[address1]',
		'$_POST[address2]',
		'$_POST[phone1]',
		'$_POST[phone2]',
		'$_POST[mobile]',
		'$_POST[dob]',
		'$_POST[sex]',
		'$_POST[firmname]',
		'$_POST[designation]',
		'$_POST[blood]',
		'$_POST[passport]',
		'$_POST[citizen]',
		'$_POST[memno]',
		'$ffname'
		)");
		
		
		
		$add2 = mysql_query("INSERT INTO tbl_validity (tillYear,tillMth,tillDate,memno) VALUES (
		'$_POST[dateY]','$_POST[dateM]','$_POST[dateD]','$_POST[memno]')");
		
		
		}
			?>
<center>
<table width="50%" border="0" align="center" class="table" >
  <tr>
    <td><img src="images/icons/compose.gif" />: <strong>Adding Member.</strong>&nbsp;</td>
  </tr>
  
  <tr>
    <td>					
<?
				if ($add && $add2) 
				{
				echo "<span> <font color=\"#FF0000\"><strong>Member  :".$_POST[firstname]."</strong></font> was successfully added !!! </span><br>";
				}
					else {
							echo "<span <font color=\"#FF0000\"><strong>".$_POST[firstname]."</strong></font> could not added !!! </span>";
						}
				?>
				&nbsp;
	</td>
  </tr>
  
  <tr>
    <td><div align="right"><a href="?AdminPageID=Member&Edit=New">ADD other</a> | <a href="?AdminPageID=Member">View</a> </div></td>
  </tr>
</table>
</center>
<? 
 

}
?>



