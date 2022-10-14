<?php

//================================ For Student Section ================================
if($_POST['Grade'] == '11')
		{
		$opt1=$_POST['opt_11_1'];
		$opt2=$_POST['opt_11_2'];
		$opt3=" ";
		}
			else
			{
			$opt1=$_POST['opt_12_1'];
			$opt2=$_POST['opt_12_2'];
			$opt3=$_POST['opt_12_3'];
			}
	//Add Student Profile
	if ($Student == "Add") {
		include ("../include/db.php");
		
	
	
		
		$q = "UPDATE tbl_students SET 
	
			reg_no='$_POST[regno]',
			father_fn='$_POST[fisrtname]',
			father_mn='$_POST[Midname]',
			father_ln='$_POST[lastname]',
			year_batch='$_POST[yr_batch]',
			semester='$_POST[Grade]',
			admission_date='$_POST[ad_dt]',
			religion = '$_POST[religion]',
			ctizn_no = '$_POST[CitizenshipNo]',   
			father_cont = '$_POST[fcontact]',  
			guardian_name = 'null',
			edu_board = '$_POST[Board]',
			edu_school= 'null',
			edu_pass_yr = '$_POST[passyear]',
			edu_pass_div = '$_POST[pdivision]',
			edu_sym_no = '$_POST[symNo]',
			edu_percent = '$_POST[Percentage]',  
			opt_cource_1 = '$opt1',  
			opt_cource_2 = '$opt2',
			opt_cource_3 = '$opt3', 
			nationality = '$_POST[nationality]'  
			
			WHERE id = '$_POST[id]'";
		//  Run query
		$r = mysql_query($q); 
		
		if($r){
		
				?>
		<table width="450" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
		  <tr align="center">
		    <td bgcolor="#F8F7FD" class="title">Confirmation!</td>
		  </tr>
		  <tr>
			<td height="102" class="text"><div align="center">New <strong>Student</strong>has been added to the <strong>database</strong> successfully</div>
			</td>
		  </tr>
		  <tr>
			<td><div align="right"><a href="?AdminPageID=Registration">Register Another</a> &nbsp;<span class="small">|</span>&nbsp; <a href="?AdminPageID=Students&View=StdProfile&id=<?=$_POST['id'];?>">View Profile</a> &nbsp;<span class="small">|</span> &nbsp;<a href="?AdminPageID=Students&New=ModStdProfile&id=<?=$_POST['id'];?>">Modify Profile</a>&nbsp; </div>
			</td>
		  </tr>
		</table><br>
			<? }
			else
			echo "error";
	}
	
	//Modify Student Profile
	if ($Student == "Modify"){
		include ("../include/db.php");
		$query = "UPDATE tbl_members, tbl_students SET
		username='$_POST[username]',
		password='$_POST[password]',
		firstname='$_POST[firstname]',
		middlename='$_POST[middlename]',
		lastname='$_POST[lastname]',
		gender='$_POST[gender]',
		email='$_POST[email]',
		dob='$_POST[dob]',
		website='$_POST[url]',
		phone1='$_POST[phone1]',
		phone2='$_POST[phone2]',
		mobile='$_POST[mobile]',
		address1='$_POST[address1]',
		address2='$_POST[address2]',
		city='$_POST[city]',
		country='$_POST[country]',
		hobbies='$_POST[hobbies]',
		reg_no='$_POST[regno]',
		father_fn='$_POST[ffn]',
		father_mn='$_POST[fmn]',
		father_ln='$_POST[fln]',
		year_batch='$_POST[yr_batch]',
		semester='$_POST[sem]',
		admission_date='$_POST[ad_dt]'	
		WHERE tbl_members.id = tbl_students.id AND tbl_members.id = '$_POST[id]'";

		$result = mysql_query($query);
		if ($result) {
		?>
			<br><center>
			<table width="70%" height="104" border="0" cellpadding="3" cellspacing="0" bgcolor="#F4F4F4" class="table">
			  <tr>
				<td height="10" class="text"></td>
			  </tr>		
			  <tr bgcolor="#FFFFFF">
				<td height="54" class="text"><div align="center">Profile of <font color="#FF0000"><strong><?=$_POST['firstname'];?></strong></font> has been <font color="#FF0000"><strong>modified</strong></font> Succesfully!<p><input type="button" name="Submit" value="Ok" onClick="history.go(-2)" class="search_box1"></div></td>
			  </tr>
			</table></center><br>
		<?
		}
		else {
			echo "<center><span class=\"text\"><font color=\"#FF0000\">".mysql_error()."</font></span><br><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"history.go(-1)\" class=\"search_box1\"></center><p>";
			@header ("Location: admin.php?AdminPageID=Students");
		}
	}
	
	//Delete Student Profile/Record
	if ($Student == "Delete") {
		include ("../include/db.php");
		
		$rq = "SELECT firstname, photo, auth_user from tbl_members where id=".$_GET['id'];
		$re = mysql_query($rq);
		$show = @mysql_fetch_array($re);
		if ($show){
			@unlink("../members/mem_photos/$show[photo]");

			//Remove from tbl_students first
			$RemStdQuery = mysql_query("DELETE FROM tbl_students WHERE id = '$_GET[id]'");
			if ($RemStdQuery) {
				//Now remove from tbl_members
				$RemMemQuery = mysql_query("DELETE FROM tbl_members WHERE id = '$_GET[id]'");
				if ($RemMemQuery) {
					echo "<br><center><table width=\"70%\" height=\"104\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#F4F4F4\" class=\"table\">
							  <tr>
								<td height=\"10\" class=\"text\"></td>
							  </tr>		
							  <tr bgcolor=\"#FFFFFF\">
								<td height=\"54\" class=\"text\"><div align=\"center\"><strong>$show[auth_user]: <font color=\"#FF0000\"><strong>$show[firstname]</font></strong> has been <font color=\"#FF0000\"><strong>deleted</strong></font> from Database Succesfully!<p><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?AdminPageID=Students'\" class=\"search_box1\"></div></td>
							  </tr>
							</table></center><br>";
				} 
				else {
					echo "<script>alert('Error: User Delete')</script>";
				}			
			}	
		}
	}

//================================ End Student Section ================================

//================================= For Staff Section =================================
	
	//Add Staff Profile
	if ($Staff == "Add") {
		include ("../include/db.php");
		$q = "UPDATE tbl_staffs SET 
			designation='$_POST[desig]',
			education='$_POST[edu]',
			job_type='$_POST[jb_tp]',
			salary='$_POST[sal]',
			joined_date='$_POST[jd_dt]'
			WHERE id = '$_POST[id]'";
		//  Run query
		$r = mysql_query($q); 		
		?>
		<table width="450" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
		  <tr>
		    <td bgcolor="#F8F7FD" class="title">Confirmation!</td>
		  </tr>
		  <tr>
			<td height="102" class="text"><div align="center">New <strong>Staff</strong>has been added to the <strong>database</strong> successfully</div>
			</td>
		  </tr>
		  <tr>
			<td><div align="right"><a href="?AdminPageID=Registration">Register Another</a> &nbsp;<span class="small">|</span>&nbsp; <a href="?AdminPageID=Staffs&View=StfProfile&id=<?=$_POST['id'];?>">View Profile</a> &nbsp;<span class="small">|</span> &nbsp;<a href="?AdminPageID=Staffs&New=ModStfProfile&id=<?=$_POST['id'];?>">Modify Profile</a>&nbsp; </div>
			</td>
		  </tr>
		</table><br>
		<?
	}
	
	//Modify Staff Profile
	if ($Staff == "Modify"){
		include ("../include/db.php");
		$query = "UPDATE tbl_members, tbl_staffs SET
		username='$_POST[username]',
		password='$_POST[password]',
		auth_user='$_POST[dept]',
		firstname='$_POST[firstname]',
		middlename='$_POST[middlename]',
		lastname='$_POST[lastname]',
		gender='$_POST[gender]',
		email='$_POST[email]',
		dob='$_POST[dob]',
		website='$_POST[url]',
		phone1='$_POST[phone1]',
		phone2='$_POST[phone2]',
		mobile='$_POST[mobile]',
		address1='$_POST[address1]',
		address2='$_POST[address2]',
		city='$_POST[city]',
		country='$_POST[country]',
		hobbies='$_POST[hobbies]',
		designation='$_POST[desig]',
		education='$_POST[edu]',
		job_type='$_POST[jb_tp]',
		salary='$_POST[sal]',
		joined_date='$_POST[jd_dt]'	
		WHERE tbl_members.id = tbl_staffs.id AND tbl_members.id = '$_POST[id]'";

		$result = mysql_query($query);
		if ($result) {
		?>
			<br><center>
			<table width="70%" height="104" border="0" cellpadding="3" cellspacing="0" bgcolor="#F4F4F4" class="table">
			  <tr>
				<td height="10" class="text"></td>
			  </tr>		
			  <tr bgcolor="#FFFFFF">
				<td height="54" class="text"><div align="center">Profile of <font color="#FF0000"><strong><?=$_POST['firstname'];?></strong></font> has been <font color="#FF0000"><strong>modified</strong></font> Succesfully!<p><input type="button" name="Submit" value="Ok" onClick="history.go(-2)" class="search_box1"></div></td>
			  </tr>
			</table></center><br>
		<?
		}
		else {
			echo "<center><span class=\"text\"><font color=\"#FF0000\">".mysql_error()."</font></span><br><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"history.go(-1)\" class=\"search_box1\"></center><p>";
			@header ("Location: admin.php?AdminPageID=Students");
		}
	}
	
	//Delete Staff Profile/Record
	if ($Staff == "Delete") {
		include ("../include/db.php");
		
		$rq = "SELECT firstname, photo, auth_user from tbl_members where id=".$_GET['id'];
		$re = mysql_query($rq);
		$show = @mysql_fetch_array($re);
		if ($show){
			@unlink("../members/mem_photos/$show[photo]");

			//Remove from tbl_staffs first
			$RemStdQuery = mysql_query("DELETE FROM tbl_staffs WHERE id = '$_GET[id]'");
			if ($RemStdQuery) {
				//Now remove from tbl_members
				$RemMemQuery = mysql_query("DELETE FROM tbl_members WHERE id = '$_GET[id]'");
				if ($RemMemQuery) {
					echo "<br><center><table width=\"70%\" height=\"104\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#F4F4F4\" class=\"table\">
							  <tr>
								<td height=\"10\" class=\"text\"></td>
							  </tr>		
							  <tr bgcolor=\"#FFFFFF\">
								<td height=\"54\" class=\"text\"><div align=\"center\"><strong>$show[auth_user]: <font color=\"#FF0000\"><strong>$show[firstname]</font></strong> has been <font color=\"#FF0000\"><strong>deleted</strong></font> from Database Succesfully!<p><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?AdminPageID=Staffs'\" class=\"search_box1\"></div></td>
							  </tr>
							</table></center><br>";
				} 
				else {
					echo "<script>alert('Error: User Delete')</script>";
				}			
			}	
		}
	}
	
//================================= End Staff Section =================================

?>