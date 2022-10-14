		<script language="javascript">
<!-- 
function form_Validator(form)
{

  if (form.firstname.value == "")
  {
    alert("Firstname cant be empty.");
    form.firstname.focus();
	return (false);
     }

  if (form.lastname.value == "")
  {
    alert("Last Name cant be empty.");
    form.lastname.focus();
	return (false);
     }

 if (form.memno.value == "")
  {
    alert("Membership No cant be empty.");
    form.memno.focus();
	return (false);
     }
	  
	  if (form.sex.value == "")
  {
    alert("Gender cant be empty.");
    form.sex.focus();
	return (false);
     }
	  
	  if (form.address1.value == "")
  {
    alert("Permanent address cant be empty.");
    form.address1.focus();
	return (false);
     }

  if (form.firmname.value == "")
  {
    alert("You must enter the firmname.");
    form.firmname.focus();
    return (false);
  }
  
  if (form.dateY.value == "")
  {
    alert("You must enter the Validity Year.");
    form.dateY.focus();
    return (false);
  }
  
  if (form.dateM.value == "")
  {
    alert("You must enter the Validity Month.");
    form.dateM.focus();
    return (false);
  }
  
  if (form.dateD.value == "")
  {
    alert("You must enter the Validity Date.");
    form.dateD.focus();
    return (false);
  }
  return (true);
  }
  //-->
</script>
		
		
		<form action="?AdminPageID=Member&Edit=NewMemberEnf&mem=Add" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
		  <table  width=750 border="0" align="center" cellpadding="5" cellspacing="1" class="table">
			<tr > 
			  <td  class="text">First Name <font color="#FF0000">*</font></td>
			  <td ><input type="text" name="firstname" value="<?=$_POST['firstname'];?>" size="20" id="fname" ></td>
			</tr>
			<tr > 
			  <td class="text">Middle Name</td>
			  <td><input type="text" name="middlename" value="<?=$_POST['middlename'];?>" size="10" ></td>
			</tr>
			<tr > 
			  <td class="text">Last Name <font color="#FF0000">*</font></td>
			  <td><input type="text" name="lastname" value="<?=$_POST['lastname'];?>" size="20" id="lname" ></td>
			</tr>
			<tr>
			  <td class="text">Member No<font color="#FF0000">*</font></td>
			  <td><input name="memno" value="<?=$_POST['memno'];?>" id="memno" ></td>
			</tr>
			<tr>
			  <td class="text">Gender <font color="#FF0000">*</font></td>
			  <td><select name="sex" id="sex" >
			  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[sex]\" selected>$_POST[sex]</option>";
				  }
				  else {
				  echo "<option>Please Select</option>";
				  }
			  ?>
				  <option>--------</option>
				  <option>Male</option>
				  <option>Female</option>
				</select>			  </td>
			</tr>
			<tr > 
			  <td class="text">Image</td>
			  <td> <input  type="file" size="20" name="upload" /><br />
	  Image of size less than 100 X 100 px. Thank You.	&nbsp;</td>
			</tr>
			<tr>
			  <td class="text">Date of Birth </td>
			  <td class="text"><input type="text" name="dob" value="<?=$_POST['dob'];?>" id="dob" > Eg: August 04, 1983</td>
			</tr>
			
			<tr>
			  <td class="text">Telephone 1</td>
			  <td><input name="phone1" value="<?=$_POST['phone1'];?>" ></td>
			</tr>
			<tr>
			  <td class="text">Telephone 2</td>
			  <td><input name="phone2" value="<?=$_POST['phone2'];?>" ></td>
			</tr>
			<tr>
			  <td class="text">Mobile</td>
			  <td><input name="mobile" value="<?=$_POST['mobile'];?>" ></td>
			</tr>
			<tr>
			  <td class="text" valign="top">Permanent Address<font color="#FF0000">*</font></td>
			  <td><textarea name="address1" cols="30" rows="5" id="padd" ><?=$_POST['address1'];?></textarea></td>
			</tr>
			<tr>
			  <td class="text" valign="top">Temporary Address</td>
			  <td><textarea name="address2" cols="30" rows="5" ><?=$_POST['address2'];?></textarea></td>
			</tr>
			<tr>
			  <td class="text">Firm Name <font color="#FF0000">*</font></td>
			  <td><input name="firmname" value="<?=$_POST['firmname'];?>" id="firmname" ></td>
			</tr>
			
			<tr>
			  <td class="text">Designation</td>
			  <td><input name="designation" value="<?=$_POST['designation'];?>" id="designation" ></td>
			</tr>
			<tr>
			  <td class="text">Citizenship No</td>
			  <td class="text"><input type="text" name="citizen" value="<?=$_POST['citizen'];?>" ></td>
			</tr>
			<tr>
			  <td class="text">Blood</td>
			  <td><input name="blood" value="<?=$_POST['blood'];?>" id="blood" ></td>
			</tr>
			
			<tr>
			  <td class="text">Passport </td>
			  <td><input name="passport" value="<?=$_POST['passport'];?>" id="passport" ></td>
			</tr>
			<tr>
			  <td class="text">Valid Upto <font color="#FF0000">&nbsp;</font></td>
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
				 
				</select>&nbsp;</td>
			</tr>
			
			
			
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="submit" type="submit" value="Submit" >&nbsp;&nbsp;<input type="button" name="Submit" value="Cancel" onClick="javascript: history.back()" ></td>
			</tr>
		  </table>
		</form>