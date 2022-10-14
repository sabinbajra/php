<?
if($ViewInc=="byMemberView" )
{

	if($_POST['dateY']!="" && $_POST['firmname']!="")
	{
				include ("include/db.php");
?>
<?

$tquery = "select memno from tbl_member where firmname = '$_POST[firmname]'";
$tresult = mysql_query($tquery);
$tres = mysql_fetch_array($tresult);
$tres[memno];
	
	$query = "SELECT * FROM tbl_income where year = '$_POST[dateY]' && memno  = '$tres[memno]'";
	$result = mysql_query($query);
	

	
echo "<br>Result for :: ";
echo "<strong>&nbsp;".$_POST['firmname']."</strong>&nbsp;";
echo $_POST['dateY']."<br><br>";
?>


<table width="750" border="0" align="center" cellpadding="2" cellspacing="0" class="table">
                <tr class="text"> 
                  <td width="171" height="25" bgcolor="#ECECEC"><div align="left"><strong>Date </strong></div></td>
                  <td width="264" height="25" bgcolor="#ECECEC"><div align="left"><strong>Income Heading | </strong></div></td>
                  <td width="187" bgcolor="#ECECEC"><div align="left"><strong>Amount|</strong></div></td>
                 
                  <td colspan="3" bgcolor="#ECECEC"><div align="left"></div></td>
                </tr>
                <?
				while ($show = mysql_fetch_array($result)) {
				
				$query2 = "SELECT heading FROM tbl_incomehead where idtbl_incomehead = '$show[inc_head_id]' ";
				$result2 = mysql_query($query2);
				$show2 = mysql_fetch_array($result2);
				
				
				//**
						if ($alternate == "1") { 
							$color = "#FDFDF7"; 
							$alternate = "2"; 
						} 
						else { 
							$color = "#FFFFFF"; 
							$alternate = "1";
						}
				//**
					$id = $show["tbl_memberid"];
				?>
                <tr  <? echo "bgcolor=$color";?> class="EE"> 
                  <td>&nbsp;<?=$show[year]." ".$show[month]." ".$show[date];?>
                    <div align="justify"></div></td>
                  <td>                   
				  
                  <div align="justify">
                    <?=$show2[heading];?>
                  </div></td>
                  <td><?=$show[amount];?>&nbsp;
                    <div align="justify"></div></td>
                
                  <td width="30">				    <?
					echo "<a href=\"#\"><img src=\"images/icons/ico_detail.gif\" border=\"0\" align=\"middle\" title=\"View Profile of $show[fname] $show[mname] $show[lname]\"></a>";
				  ?>
                    <div align="justify"></div></td>
                  <td width="27">
				  <?
				  //**
					if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "ADMIN") {
						echo "<center><a href=\"#\"><img src='images/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[fname] $show[mname] $show[lname]\"></a></center>";
					}
					else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Modify\"><img src='images/icons/ico_edit.gif' border='0'></a></center>";			
					}
					//**
				  ?>
				  <div align="justify"></div></td>
                  <td width="47"> 
                  <?
				  //**
				  	if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "ADMIN") {
						echo "<center><a href=\"##\" onclick=\"return confirm('Are you sure to delete this User')\"><img src='images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[fname] $show[mname] $show[lname])\"></a></center>";
					
					}
					else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Delete \"><img src='images/icons/ico_delete.gif' border='0'></a></center>";			
					}
					//**
				  ?>
				  <div align="justify"></div></td>
                </tr>
                <?			
				} //end of while
		  		?>
                <tr> 
                  <td colspan="9"> 
                           </td>
                </tr>
              </table>
<?
} //end of if($_POST['dateY']!="" && $_POST['dateM']1="" && $_POST['dateD']!="")
			
			
			
			else
			{
			
 				include ("include/db.php");
 				$query2="SELECT firmname from tbl_member order by firmname asc" ;
					$result2=@mysql_query($query2); //run the query
					$row2=mysql_fetch_array($result2);
					$n2 = mysql_num_rows($result2);
 ?>

<form action="?AdminPageID=ViewIncome&ViewInc=byMemberView" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
		  <table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
			<tr>
			<td colspan="2" class="title">Please Enter Information Properly
			  <hr size ="1" color="#c1cdd8"></td>
			</tr>
			<tr > 
			  <td width="134" class="text">Enter Firmname <font color="#FF0000">::</font></td>
			  <td width="593">
			  <select name="firmname" id="firmname"   >
			   
				  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[firmname]\" selected>$_POST[firmname]</option>";
				  echo "<option></option>";
				  }
				  
				  else
					{
					}
					
				  
						  for($ro = 0;$ro < $n2;$ro++)
							{
							echo "<option value=\"$row2[firmname]\">$row2[firmname]&nbsp;</option>";
							  $row2=mysql_fetch_array($result2);
							}
					
				  ?>
				  			 
				</select>
		      </td>
			</tr>
			
			
			<tr>
			  <td><span class="text">Enter Year <font color="#FF0000">::</font></span></td>
			  <td>B.S.
                <input type="text" name="dateY" value="<?=$_POST['dateY'];?>" size="10" id="dateY" >
</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="submit" type="submit" value="Submit" >&nbsp;&nbsp;<input type="button" name="Submit" value="Cancel" onClick="javascript: history.back()" ></td>
			</tr>
			
		  </table>
 </form>
 <?
}
}
 ?>