<?
if($ViewExp=="byHeadingView" )
{

	if($_POST['dateY']!=""  && $_POST['heading']!="")
	{
				include ("include/db.php");
?>
<?
	
	
					$query1="SELECT idtbl_exphead from tbl_exphead where heading = '$_POST[heading]'" ;
					$result1=@mysql_query($query1); //run the query
					$row1=mysql_fetch_array($result1);
					
	
	$query = "SELECT * FROM tbl_expenses where year = '$_POST[dateY]' && expheadid='$row1[idtbl_exphead]'";
	$result = mysql_query($query);
	
echo "<br>Result for :: ";
echo $_POST['dateY']." ";
echo $_POST['dateM'];
echo "<strong>&nbsp;Expenditure on:: ".$_POST['heading']."<strong><br><br>";
?>


<table width="750" border="0" align="center" cellpadding="2" cellspacing="0" class="table">
                <tr class="text"> 
                  <td width="124" height="25" bgcolor="#ECECEC"><div align="left"><strong>Date </strong></div></td>
                  <td width="199" height="25" bgcolor="#ECECEC"><div align="left"><strong>Particlars/Description</strong></div></td>
                  <td width="198" bgcolor="#ECECEC"><div align="left"><strong>Amount|</strong></div></td>
                 
                  <td colspan="3" bgcolor="#ECECEC"><div align="left"></div></td>
                </tr>
                <?
				while ($show = mysql_fetch_array($result)) {
				$query2 = "SELECT heading FROM tbl_exphead where idtbl_exphead = '$show[expheadid]' ";
				$result2 = mysql_query($query2);
				$show2 = mysql_fetch_array($result2);
				
					if ($alternate == "1") { 
						$color = "#FDFDF7"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#FFFFFF"; 
						$alternate = "1";
					}
					
					$id = $show["tbl_memberid"];
				?>
                <tr  <? echo "bgcolor=$color";?> class="EE"> 
                  <td>&nbsp;<?=$show[year]." ".$show[month]." ".$show[date];?>
                    <div align="justify"></div></td>
                   <td><?=$show2[heading];?> 
                    <div align="justify"></div></td>
                  <td><?=$show[amount];?>&nbsp;
                    <div align="justify"></div></td>
                
                  <td width="21">				    <?
					echo "<a href=\"#\"><img src=\"images/icons/ico_detail.gif\" border=\"0\" align=\"middle\" title=\"View Profile of $show[fname] $show[mname] $show[lname]\"></a>";
				  ?>
                    <div align="justify"></div></td>
                  <td width="19">
				  <?
					if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "ADMIN") {
						echo "<center><a href=\"#\"><img src='images/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[fname] $show[mname] $show[lname]\"></a></center>";
					}
					else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Modify\"><img src='images/icons/ico_edit.gif' border='0'></a></center>";			
					}
				  ?>
				  <div align="justify"></div></td>
                  <td width="31"> 
                  <?
				  	if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "ADMIN") {
						echo "<center><a href=\"##\" onclick=\"return confirm('Are you sure to delete this User')\"><img src='images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[fname] $show[mname] $show[lname])\"></a></center>";
					
					}
					else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Delete \"><img src='images/icons/ico_delete.gif' border='0'></a></center>";			
					}
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
			
			//8888888888888888888888888888888888888888888888888888
			//8888888888888888888888888888888888888888888888888888
			//8888888888888888888888888888888888888888888888888888
	else if($_POST['dateY']!="" &&$_POST['dateM']!="" && $_POST['heading']!="")
	{
				include ("include/db.php");
			?>
			<?
	
	
					$query1="SELECT idtbl_exphead from tbl_exphead where heading = '$_POST[heading]'" ;
					$result1=@mysql_query($query1); //run the query
					$row1=mysql_fetch_array($result1);
					
	
	$query = "SELECT * FROM tbl_expenses where year = '$_POST[dateY]' && month = '$_POST[dateM]' && expheadid='$row1[idtbl_exphead]'";
	$result = mysql_query($query);
	
echo "<br>Result for :: ";
echo $_POST['dateY']." ";
echo $_POST['dateM'];
echo "<strong>&nbsp;".$row1['heading']."<strong><br><br>";
			?>


<table width="750" border="0" align="center" cellpadding="2" cellspacing="0" class="table">
                <tr class="text"> 
                  <td width="124" height="25" bgcolor="#ECECEC"><div align="left"><strong>Date </strong></div></td>
                  <td width="199" height="25" bgcolor="#ECECEC"><div align="left"><strong>Particlars/Description</strong></div></td>
                  <td width="198" bgcolor="#ECECEC"><div align="left"><strong>Amount|</strong></div></td>
                 
                  <td colspan="3" bgcolor="#ECECEC"><div align="left"></div></td>
                </tr>
                <?
				while ($show = mysql_fetch_array($result)) {
				$query2 = "SELECT heading FROM tbl_exphead where idtbl_exphead = '$show[expheadid]' ";
				$result2 = mysql_query($query2);
				$show2 = mysql_fetch_array($result2);
				
					if ($alternate == "1") { 
						$color = "#FDFDF7"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#FFFFFF"; 
						$alternate = "1";
					}
					
					$id = $show["tbl_memberid"];
				?>
                <tr  <? echo "bgcolor=$color";?> class="EE"> 
                  <td>&nbsp;<?=$show[year]." ".$show[month]." ".$show[date];?>
                    <div align="justify"></div></td>
                   <td><?=$show2[heading];?> 
                    <div align="justify"></div></td>
                  <td><?=$show[amount];?>&nbsp;
                    <div align="justify"></div></td>
                
                  <td width="21">				    <?
					echo "<a href=\"#\"><img src=\"images/icons/ico_detail.gif\" border=\"0\" align=\"middle\" title=\"View Profile of $show[fname] $show[mname] $show[lname]\"></a>";
				  ?>
                    <div align="justify"></div></td>
                  <td width="19">
				  <?
					if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "ADMIN") {
						echo "<center><a href=\"#\"><img src='images/icons/ico_edit.gif' border='0' title=\"Edit Profile of $show[fname] $show[mname] $show[lname]\"></a></center>";
					}
					else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Modify\"><img src='images/icons/ico_edit.gif' border='0'></a></center>";			
					}
				  ?>
				  <div align="justify"></div></td>
                  <td width="31"> 
                  <?
				  	if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "ADMIN") {
						echo "<center><a href=\"##\" onclick=\"return confirm('Are you sure to delete this User')\"><img src='images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[fname] $show[mname] $show[lname])\"></a></center>";
					
					}
					else {
						echo "<center><a href=\"#\" onclick=\"alert('Your don\'t have Permission to Delete \"><img src='images/icons/ico_delete.gif' border='0'></a></center>";			
					}
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
			
			
			
			
			
			
			//8888888888888888888888888888888888888888888888888888
			//8888888888888888888888888888888888888888888888888888
			//8888888888888888888888888888888888888888888888888888
			//8888888888888888888888888888888888888888888888888888
			else
			{
			include ("include/db.php");
 				$query2="SELECT heading from tbl_exphead order by heading asc" ;
					$result2=@mysql_query($query2); //run the query
					$row2=mysql_fetch_array($result2);
					$n2 = mysql_num_rows($result2);
?>

<form action="?AdminPageID=ViewExpenses&ViewExp=byHeadingView" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
		  <table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
			<tr>
			<td colspan="2" class="title">Please Enter Information Properly
			  <hr size ="1" color="#c1cdd8"></td>
			</tr>
			<tr > 
			  <td width="134" class="text">Enter Heading <font color="#FF0000">::</font></td>
			  <td width="593"><select name="heading" id="heading"   >
			  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[heading]\" selected>$_POST[heading]</option>";
				  }
				  else {
				
				  }
				  
			  ?>
				  <option>--------</option>
				  <?
				  for($ro = 0;$ro < $n2;$ro++)
							{
							echo "<option value=\"$row2[heading]\">$row2[heading]&nbsp;</option>";
							  $row2=mysql_fetch_array($result2);
							}
				  ?>
				  			 
				</select>&nbsp;
		      </td>
			</tr>
			
			
			<tr>
			  <td><span class="text">Enter Date<font color="#FF0000">::</font></span></td>
			  <td>B.S.
                <input type="text" name="dateY" value="<?=$_POST['dateY'];?>" size="10" id="dateY" >
Month&nbsp;
<select name="dateM" id="dateM" >
  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[dateM]\" selected>$_POST[dateM]</option>";
				  }
				  else {
				  
				  }
			  ?>
  <option></option>
  <option>Baisakh</option>
  <option>Jestha</option>
  <option>Asar</option>
  <option>Shrawan</option>
  <option>Bhadra</option>
  <option>Asoj</option>
  <option>Kartik</option>
  <option>Manghsir</option>
  <option>Poush</option>
  <option>Magh</option>
  <option>Falgun</option>
  <option>Chaitra</option>
</select></td>
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