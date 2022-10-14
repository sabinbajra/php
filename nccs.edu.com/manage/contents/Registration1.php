<?php
	// connect database
	include ("../include/db.php");

	// ==== Input validation and PHP dBase code ===============================
	//
	// ========================================================================

	if ($_GET["Register"] == "User") {
		$bInputFlag = false;
		foreach ($_POST as $field) {
			if ($field == "") {
				$bInputFlag = false;
			}
			else {
				$bInputFlag = true;
			}
		}
		// If we had problems with the input, exit with error
		if ($bInputFlag == false) {
			die( "Problem with registration info. "
				."Please go back and try again.");
		}
		
		if (empty($_POST['category'])) {
			echo "<table width=\"750\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"1\" class=\"table\">
				<tr> 
				  <td class=\"text\" colspan=\"2\"><font color=\"#FF0000\"><strong>Error:</strong> Please select category- <strong>Student/Staff!</strong></td>
				</tr>
			  </table><br>";
			include "RegForm.php";
		}
		
		else {		
			$s_date= date("F j, Y");
			//  Setup query
			$Query = "INSERT INTO tbl_members (
			username,
			password,
			auth_user,
			firstname,
			middlename,
			lastname,
			gender,
			email,
			dob,
			website,
			phone1,
			phone2,
			mobile,
			address1,
			address2,
			city,
			country,
			hobbies
			) 
			
			VALUES (
			'$_POST[username]',		
			'$_POST[password]',
			'$_POST[type]',		
			'$_POST[firstname]', 
			'$_POST[middlename]', 
			'$_POST[lastname]', 
			'$_POST[gender]',
			'$_POST[email]',
			'$_POST[dob]',
			'$_POST[url]',
			'$_POST[phone1]',
			'$_POST[phone2]',
			'$_POST[mobile]',
			'$_POST[address1]',
			'$_POST[address2]',
			'$_POST[city]',
			'$_POST[country]',
			'$_POST[hobbies]'
			)"; 
	
			//  Run query
			$Result = mysql_query($Query);
			
			// Make sure query inserted user successfully
			if (!$Result) {
				echo "
				  <table width=\"750\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"1\" class=\"table\">
					<tr> 
					  <td class=\"text\" colspan=\"2\"><font color=\"#FF0000\">Username: <strong>$username</strong> already exist please try another...<br>Or you can use the following names instead... </font>
					<font color=#FF0000><ul>
						<li>".STRTOLOWER($_POST[username])."_". STRTOLOWER($_POST[firstname])."</li>
						<li>".STRTOLOWER($_POST[firstname])."_".STRTOLOWER($_POST[lastname])."</li>
						<li>".STRTOLOWER($_POST[firstname])."_".STRTOLOWER($_POST[username])."</li>
						<li>".STRTOLOWER($_POST[username])."_01</li>
						<li>".STRTOLOWER($_POST[username])."_02</li>
					</ul></font>
					  </td>
					</tr>
				  </table><br>";
				  include "RegForm.php";
			}
			else {
				// Redirect to category form page.
				
				include ("../include/db.php");
				$temp1 = mysql_query("SELECT * from tbl_members");
				$count = mysql_num_rows($temp1);
				
				while ($show = mysql_fetch_array($temp1)) {
					if($count<$show[id])
						$count=$show[id];
				} // end of while
					
				$id=$count;
				$result = mysql_query("SELECT * from tbl_members where id=$id");
				$show = mysql_fetch_array($result);
				
				if ($_POST['category'] == "Student") {	
					//$s_date_y= date("Y");
					$TempRegNo = "NCCSHSS-".$show['id'];
					
					$setID = mysql_query("INSERT INTO tbl_students (reg_no, year_batch, id) VALUES ('$TempRegNo', '', '$show[id]')");
					//$query = "INSERT INTO tbl_students id VALUES $show[id]";
					//$setID=mysql_query($query);
					include "RegStd.php";
				}
				if ($_POST['category'] == "Staff") {				
					$setID = mysql_query("INSERT INTO tbl_staffs (id) VALUES ('$show[id]')");
					include "RegStf.php";
				}
			}// end of redirecton
		}//end else validation/form
	} // end if
	
	// ==== Main Form =========================================================
	else {
		include "RegForm.php";
	}
	// ============================================================	
	
?>