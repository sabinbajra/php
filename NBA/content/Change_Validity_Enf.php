<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: index.php");
		}

	include ("include/db.php");
	$query = "Select * from tbl_validity where memno = '$_POST[memno]'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
if($Action == "")
{	
?>
<script language="javascript">
<!-- 
function form_Validator(form)
{

  if (form.dateY.value == "")
  {
    alert("Please Enter Year.");
    form.dateY.focus();
	return (false);
     }

  if (form.dateM.value == "")
  {
    alert("Please enter Month.");
    form.dateM.focus();
	return (false);
     }

  if (form.dateD.value == "")
  {
    alert("Please enter Date.");
    form.dateD.focus();
    return (false);
  }
  
  return (true);
  }
  //-->
</script>

		<form action="main.php?AdminPageID=Option&Opt=Change_Validity_Enf&Action=Change" method="post" onSubmit=" return form_Validator(this)">
		
			<table width="510" border="0" cellspacing="1" cellpadding="3" class="table" align="center">
			  <tr> 
				  <td class="title"> Renewal Validity
			    <hr size ="1" color="#c1cdd8"></td>
			  </tr>
				<tr>
				  <td>
					<table width="100%" border="0" cellspacing="1" cellpadding="3" align="center">
			  	  <tr> 
						<td class="text">Old Valid date: </td>
						<td class="text"><strong>&nbsp;<?=$show['tillYear'];?> - <?=$show['tillMth'];?> - <?=$show['tillDate'];?>  </strong></td>
			  	  </tr>
			  	  <tr> 
						<td class="text">New Valid date: </td>
						<td><input type="hidden" name="memno" value="<?=$_POST[memno]?>">B.S.
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
				 
				</select>&nbsp;&nbsp;</td>
			  	  </tr>
			  	  <tr> 
						<td class="text">&nbsp;</td>
						<td><div align="center">
						  <input type=submit name=submit value="Renew" >
					    </div></td>
			  	  </tr>
					</table>
				  </td>
			  </tr>
			</table>

<?
}
?>
<?php

	// =========================== T0 Change The PWD ===========================//
	if ($Action == "Change") {
	
		$query = "UPDATE tbl_validity SET 
						tillYear = '$_POST[dateY]',
						tillMth = '$_POST[dateM]',
						tillDate = '$_POST[dateD]'
					WHERE memno = '$_REQUEST[memno]' ";
				$result = mysql_query($query);
				echo "<br><center><table width=\"60%\"  border=\"0\" cellpadding=\"3\" bgcolor=\"#F4F4F4\" class=\"table\" align=\"center\">
						 	
						  <tr bgcolor=\"#FFFFFF\">
							<td height=\"22\" class=\"text\">Confirmation:<hr size =\"1\" color=\"#c1cdd8\"><div align=\"center\"><font color=\"#FF0000\"><strong>Membership Renewal succesful!! </strong></font> 
							</div></td>
						  </tr>
						   
						   <tr bgcolor=\"#FFFFFF\">
							<td height=\"22\" class=\"text\" align=right><a href=\"?AdminPageID=Option&Opt=Change_Validity\">Renew Other:</a></td>
						  </tr>
						  
						</table></center>";
	}
	// =========================== End of Changing PWD ===========================//



?>