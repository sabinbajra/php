<?
if($ViewExp=="byDateView" )
{
	if($_POST['dateY']!="" && $_POST['dateM']!="" && $_POST['dateD']!="")
	{


?>




<?
	include ("include/db.php");
	$query = "SELECT * FROM tbl_expenses where year = '$_POST[dateY]' && month  = '$_POST[dateM]' && date = '$_POST[dateD]'";
	$result = mysql_query($query);

	$query = "SELECT * FROM tbl_expenses where year = '$_POST[dateY]' && month  = '$_POST[dateM]' && date = '$_POST[dateD]'";
	$result = mysql_query($query);

echo "<br>Result for :: ";
echo $_POST['dateY']." ";
echo $_POST['dateM']." ";
echo $_POST['dateD']."<br><br>";

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
				$query1 = "SELECT heading FROM tbl_exphead where idtbl_exphead = $show[expheadid]";
				$result1 = mysql_query($query1);
				$show1 = mysql_fetch_array($result1);
					if ($alternate == "1") { 
						$color = "#FDFDF7"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#FFFFFF"; 
						$alternate = "1";
					}
					
					
				?>
                <tr  <? echo "bgcolor=$color";?> class="EE"> 
                  <td>&nbsp;<?=$show[year]." ".$show[month]." ".$show[date];?>
                    <div align="justify"></div></td>
                  m
                  <td><?=$show1[heading];?> 
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
                  <?
					$q = "SELECT count(*) as count FROM tbl_member";
					$r = mysql_query($q);
					$row = mysql_fetch_array($r);
					$numrows = $row['count'];
				  ?>                  </td>
                </tr>
              </table>
<?
} //end of if($_POST['dateY']!="" && $_POST['dateM']1="" && $_POST['dateD']!="")
			else
			{
			
			//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&quot;
			
			?>
			<form action="?AdminPageID=ViewExpenses&ViewExp=byDateView" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
		  <table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
			<tr>
			<td colspan="2" class="title">Please Enter date Information properly!
			  <hr size ="1" color="#c1cdd8"></td>
			</tr>
			<tr > 
			  <td width="134" class="text">Enter Date<font color="#FF0000">::</font></td>
			  <td width="593">B.S.
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
				 
				</select> 
			    Date 
				 <select name="dateD" id="dateD" >
			  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[dateD]\" selected>$_POST[dateD]</option>";
				  }
				  else {
				  
				  }
			  ?>
				  <option></option>
				  <option>1</option>
				  <option>2</option> 
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
				  <option>6</option>
				  <option>7</option>
				  <option>8</option>
				  <option>9</option>
				  <option>10</option>
				  <option>11</option>
				  <option>12</option>
					 <option>13</option>
					 <option>14</option>
					 <option>15</option>
					 <option>16</option>
					 <option>17</option>
					 <option>18</option>
					 <option>19</option>
					 <option>20</option>
					 <option>21</option>
				 <option>22</option>
				 <option>23</option>
				 <option>24</option>
				 <option>25</option>
				 <option>26</option>
				 <option>27</option>
				 <option>28</option>
				 <option>29</option>
				 <option>30</option>
				 <option>31</option>
				 <option>32</option>
				 
				</select> 
			  </td>
			</tr>
			
			
			
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="submit" type="submit" value="Submit" >&nbsp;&nbsp;<input type="button" name="Submit" value="Cancel" onClick="javascript: history.back()" ></td>
			</tr>
		  </table>
		</form>
			
			<?
			//*****************************************
			}

}//end of first if
?>





