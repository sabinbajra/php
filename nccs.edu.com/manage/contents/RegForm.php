		<form action="?AdminPageID=Registration&Register=User" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
		  <table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
			<tr> 
			  <td class="text" width="134">Username <font color="#FF0000">*</font></td>
			  <td width="593"><input type="text" name="username" value="<?=$_POST['username'];?>" size="15" maxlength="15" id="uname" class="search_box1"></td>
			</tr>
			<tr bgcolor="#FFFFFF"> 
			  <td class="text">Password <font color="#FF0000">*</font></td>
			  <td><input name="password" type="password" size="15" maxlength="15" id="passwd" class="search_box1"></td>
			</tr>
			<tr>
			  <td class="text">Type <font color="#FF0000">*</font></td>
			  <td><select name="type" id="type" class="search_box1">
			  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[type]\" selected>$_POST[type]</option>";
				  }
				  else {
				  echo "<option>Please Select</option>";
				  }
			  ?>
				  <option>--------</option>
				  <option>Administration</option>
				  <option>Library</option>
				  <option>Peon</option>
				  <option>Student</option>
				  <option>Teacher</option>
			 	  </select>			  </td>
			</tr>
			<tr bgcolor="#FFFFFF"> 
			  <td class="text">First Name <font color="#FF0000">*</font></td>
			  <td><input type="text" name="firstname" value="<?=$_POST['firstname'];?>" size="20" id="fname" class="search_box1"></td>
			</tr>
			<tr bgcolor="#FFFFFF"> 
			  <td class="text">Middle Name</td>
			  <td><input type="text" name="middlename" value="<?=$_POST['middlename'];?>" size="10" class="search_box1"></td>
			</tr>
			<tr bgcolor="#FFFFFF"> 
			  <td class="text">Last Name <font color="#FF0000">*</font></td>
			  <td><input type="text" name="lastname" value="<?=$_POST['lastname'];?>" size="20" id="lname" class="search_box1"></td>
			</tr>
			<tr>
			  <td class="text">Gender <font color="#FF0000">*</font></td>
			  <td><select name="gender" id="gender" class="search_box1">
			  <?
				  if ($_POST) {
				  echo "<option value=\"$_POST[gender]\" selected>$_POST[gender]</option>";
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
			<tr bgcolor="#FFFFFF"> 
			  <td class="text">Email</td>
			  <td><input type="text" name="email" value="<?=$_POST['email'];?>" size="20" class="search_box1"></td>
			</tr>
			<tr>
			  <td class="text">Date of Birth <font color="#FF0000">*</font></td>
			  <td class="text"><input type="text" name="dob" value="<?=$_POST['dob'];?>" id="dob" class="search_box1"> Eg: August 04, 1983</td>
			</tr>
			<tr>
			  <td class="text">Website</td>
			  <td class="text"><input type="text" name="url" value="<?=$_POST['url'];?>" class="search_box1"></td>
			</tr>
			<tr>
			  <td class="text">Telephone 1</td>
			  <td><input name="phone1" value="<?=$_POST['phone1'];?>" class="search_box1"></td>
			</tr>
			<tr>
			  <td class="text">Telephone 2</td>
			  <td><input name="phone2" value="<?=$_POST['phone2'];?>" class="search_box1"></td>
			</tr>
			<tr>
			  <td class="text">Mobile</td>
			  <td><input name="mobile" value="<?=$_POST['mobile'];?>" class="search_box1"></td>
			</tr>
			<tr>
			  <td class="text" valign="top">Permanent Address<font color="#FF0000">*</font></td>
			  <td><textarea name="address1" cols="30" rows="5" id="padd" class="search_box1"><?=$_POST['address1'];?></textarea></td>
			</tr>
			<tr>
			  <td class="text" valign="top">Temporary Address</td>
			  <td><textarea name="address2" cols="30" rows="5" class="search_box1"><?=$_POST['address2'];?></textarea></td>
			</tr>
			<tr>
			  <td class="text">City <font color="#FF0000">*</font></td>
			  <td><input name="city" value="<?=$_POST['city'];?>" id="city" class="search_box1"></td>
			</tr>
			<tr>
			  <td class="text">Country <font color="#FF0000">*</font></td>
			  <td><input name="country" value="<?=$_POST['country'];?>" id="country" class="search_box1"></td>
			</tr>
			<tr>
			  <td class="text" valign="top">Hobbies</td>
			  <td><textarea name="hobbies" cols="30" rows="5" class="search_box1"><?=$_POST['hobbies'];?></textarea></td>
			</tr>
			<tr>
			  <td class="text" valign="top">Category <font color="#FF0000">*</font></td>
			  <td class="text">
			  <?
			  	if ($_POST['category'] == "Student") {
					$CatStd = "<input name=\"category\" type=\"radio\" value=\"Student\" checked />";
				}
				else {
					$CatStd = "<input name=\"category\" type=\"radio\" value=\"Student\" />";
				}
				if ($_POST['category'] == "Staff") {
					$CatStf = "<input name=\"category\" type=\"radio\" value=\"Staff\" checked />";
				}
				else {
					$CatStf = "<input name=\"category\" type=\"radio\" value=\"Staff\" />";
				}
			  ?>
			  <?=$CatStd;?> Student <br /><?=$CatStf;?> Staff</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input name="submit" type="submit" value="Submit" class="search_box1">&nbsp;&nbsp;<input type="button" name="Submit" value="Cancel" onClick="javascript: history.back()" class="search_box1"></td>
			</tr>
		  </table>
		</form>