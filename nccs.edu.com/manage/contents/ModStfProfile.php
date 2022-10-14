<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}

	include ("../include/db.php");
	$query = "SELECT * FROM tbl_members, tbl_staffs WHERE tbl_members.id=tbl_staffs.id AND tbl_members.id=$_GET[id]";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	?>
	<form action="?AdminPageID=Staffs&New=RegisterENF&Staff=Modify&id=<?=$_GET['id'];?>" method="post">
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
		  <td class="text">Department</td>
		  <td class="text"><input type="text" name="dept" value="<?=$show['auth_user'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Designation</td>
		  <td class="text"><input type="text" name="desig" value="<?=$show['designation'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Job Type </td>
		  <td class="text"><input type="text" name="jb_tp" value="<?=$show['job_type'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Salary</td>
		  <td class="text"><input type="text" name="sal" value="<?=$show['salary'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">E-mail</td>
		  <td class="text"><input type="text" name="email" value="<?=$show['email'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">Education</td>
		  <td class="text"><input type="text" name="edu" value="<?=$show['education'];?>" class="search_box1"></td>
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
		  <td class="text">Joined On</td>
		  <td><input name="jd_dt" value="<?=$show['joined_date'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">&nbsp;</td>
		  <td><input type="submit" name="submit" value="Modify" class="search_box1">&nbsp;<input type="button" name="Submit" value="Back" onClick="javascript: history.back()" class="search_box1"></td>
		</tr>
	  </table><br>