<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}

	include ("../include/db.php");
	$query = "SELECT * FROM tbl_members, tbl_students WHERE tbl_members.id=tbl_students.id AND tbl_members.id=$_GET[id]";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	?>
	<form action="?AdminPageID=Students&New=RegisterENF&Student=Modify&id=<?=$_GET['id'];?>" method="post">
	  <input type="hidden" name="id" value="<?=$show['id'];?>">
	  <table width="95%" border="0" cellspacing="1" cellpadding="3" align="center" class="table">
		<tr>
		  <td width="24%" class="text">Username</td>
		  <td width="76%" class="text"><input type="text" name="username" value="<?=$show['username'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Password</td>
		  <td class="text"><input type="password" name="password" value="<?=$show['password'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Firstname</td>
		  <td class="text"><input type="text" name="firstname" value="<?=$show['firstname'];?>" class="search_box1"></td>
		<tr>
		<tr> 
		  <td class="text">Middlename</td>
		  <td class="text"><input type="text" name="middlename" value="<?=$show['middlename'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Lastname</td>
		  <td class="text"><input type="text" name="lastname" value="<?=$show['lastname'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Gender</td>
		  <td>
		  	<select name="gender" id="gender" class="search_box1">
			  <option value="<?=$show['gender'];?>" selected><?=$show['gender'];?></option>
			  <option>--------</option>
			  <option>Male</option>
			  <option>Female</option>
			</select>
		  </td>
		</tr>
		<tr>
		  <td class="text">Registration No.</td>
		  <td class="text"><input type="text" name="regno" value="<?=$show['reg_no'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Year/batch</td>
		  <td class="text"><input type="text" name="yr_batch" value="<?=$show['year_batch'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Semester</td>
		  <td class="text">
		  <select name="sem" id="sem" class="search_box1">
			  	<option value="<?=$show['semester'];?>" selected><?=$show['semester'];?></option>
				<option>---</option>
				<option>1st</option>
				<option>2nd</option>
				<option>3rd</option>
				<option>4th</option>
				<option>5th</option>
				<option>6th</option>
				<option>7th</option>
				<option>8th</option>
			   </select>
		  </td>
		</tr>
		<tr>
		  <td class="text">Father's First Name</td>
		  <td class="text"><input type="text" name="ffn" value="<?=$show['father_fn'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Father's Middle Name</td>
		  <td class="text"><input type="text" name="fmn" value="<?=$show['father_mn'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Father's Last Name</td>
		  <td class="text"><input type="text" name="fln" value="<?=$show['father_ln'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">E-mail</td>
		  <td class="text"><input type="text" name="email" value="<?=$show['email'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Date of Birth</td>
		  <td class="text"><input type="text" name="dob" value="<?=$show['dob'];?>" class="search_box1"> Eg: August 04, 1983</td>
		</tr>
		<tr>
		  <td class="text">Website</td>
		  <td class="text"><input type="text" name="url" value="<?=$show['website'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Telephone 1</td>
		  <td><input name="phone1" value="<?=$show['phone1'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Telephone 2</td>
		  <td><input name="phone2" value="<?=$show['phone2'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Mobile</td>
		  <td><input name="mobile" value="<?=$show['mobile'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text" valign="top">Permanent Address </td>
		  <td><textarea name="address1" cols="30" rows="5" class="search_box1"><?=$show['address1'];?></textarea></td>
		</tr>
		<tr>
		  <td class="text" valign="top">Temporary Address</td>
		  <td><textarea name="address2" cols="30" rows="5" class="search_box1"><?=$show['address2'];?></textarea></td>
		</tr>
		<tr>
		  <td class="text">City</td>
		  <td><input name="city" value="<?=$show['city'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Country</td>
		  <td><input name="country" value="<?=$show['country'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text" valign="top">Hobbies</td>
		  <td><textarea name="hobbies" cols="30" rows="5" class="search_box1"><?=$show['hobbies'];?></textarea></td>
		</tr>
		<tr>
		  <td class="text">Admission On</td>
		  <td><input name="ad_dt" value="<?=$show['admission_date'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">&nbsp;</td>
		  <td><input type="submit" name="submit" value="Modify" class="search_box1">&nbsp;<input type="button" name="Submit" value="Back" onClick="javascript: history.back()" class="search_box1"></td>
		</tr>
	  </table><br>