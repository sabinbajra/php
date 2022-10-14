<?
	// Modify Profile
	if ($ProMod == "Mod") {
		include ("../include/db.php");
		if ($_SESSION["valid_user"] == "admin" || $_SESSION["valid_user"] == "administrator") {
			$query = "UPDATE tbl_admin SET
			gender='$gender',
			designation='$designation',
			dob='$dob',
			phone='$phone',
			mobile='$mobile',
			email='$email',
			address='$address'
			WHERE id = '$_SESSION[valid_id]'";	
		}
		else {
			$query = "UPDATE tbl_admin SET
			firstname='$firstname',
			middlename='$middlename',
			lastname='$lastname',
			gender='$gender',
			designation='$designation',
			dob='$dob',
			phone='$phone',
			mobile='$mobile',
			email='$email',
			address='$address'
			WHERE id = '$_SESSION[valid_id]'";
		}
		$result = mysql_query($query);
			if ($result) {
				echo "<br><center><table width=\"70%\" height=\"104\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#F4F4F4\" class=\"table\">
						  <tr>
							<td height=\"10\" class=\"text\"></td>
						  </tr>		
						  <tr bgcolor=\"#FFFFFF\">
							<td height=\"54\" class=\"text\"><div align=\"center\">Your Profile has been <font color=\"#FF0000\"><strong>modified</strong></font> Succesfully!<p><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"history.go(-2)\" class=\"search_box1\"></div></td>
						  </tr> 
						</table></center><br>";
				//echo "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?articles=index\">";
			} else {
				echo mysql_error();
				header ("Location: admin.php?AdminPageID=Option&Opt=My_Profile");
			}
	}
	
	//Delete Articles
	if ($Do == "Delete") {
		include ("../include/db.php");
		
		$rq = "SELECT * from articles where id=$id";
		$re = mysql_query($rq);
		$show = @mysql_fetch_array($re);
		if ($show){
			@unlink("../contents/articles/$show[article]");
		
			$query = "DELETE FROM articles WHERE id = '$id'";
			$result = mysql_query($query);
			
				if ($result) {
					echo "<br><center><table width=\"70%\" height=\"104\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#F4F4F4\" class=\"table\">
							  <tr>
								<td height=\"10\" class=\"text\"></td>
							  </tr>		
							  <tr bgcolor=\"#FFFFFF\">
								<td height=\"54\" class=\"text\"><div align=\"center\"><strong>Article: <font color=\"#FF0000\"><strong>$show[article]</font></strong> has been <font color=\"#FF0000\"><strong>deleted</strong></font> from Database Succesfully!<p><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"javascript: history.back()\" class=\"search_box1\"></div></td>
							  </tr>
							</table></center><br>";
					//echo "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?articles=index\">";
				} 
				else {
					echo "<script> alert('Error: Article Delete')</script>";
					include ("admin.php?pageID=home");
				}
		}
	}
	
	//Delete Results
	if ($DoRes == "Delete") {
		include ("../include/db.php");
		
		$rq = "SELECT * from results where id=$id";
		$re = mysql_query($rq);
		$show = @mysql_fetch_array($re);
		if ($show){
			@unlink("../contents/results/$show[result]");
		
			$query = "DELETE FROM results WHERE id = '$id'";
			$result = mysql_query($query);
			
				if ($result) {
					echo "<br><center><table width=\"70%\" height=\"104\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#F4F4F4\" class=\"table\">
							  <tr>
								<td height=\"10\" class=\"text\"></td>
							  </tr>		
							  <tr bgcolor=\"#FFFFFF\">
								<td height=\"54\" class=\"text\"><div align=\"center\"><strong>Result: <font color=\"#FF0000\"><strong>$show[article]</font></strong> has been <font color=\"#FF0000\"><strong>deleted</strong></font> from Database Succesfully!<p><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"javascript: history.back()\" class=\"search_box1\"></div></td>
							  </tr>
							</table></center><br>";
					//echo "<meta http-equiv=\"refresh\" content=\"1;URL=index.php?articles=index\">";
				} 
				else {
					echo "<script> alert('Error: Result Delete')</script>";
					include ("admin.php?pageID=Result");
				}
		}
	}
?>