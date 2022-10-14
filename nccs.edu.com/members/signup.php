<?php
	// dbConfig.php is a file that contains your
	// database connection information. This
	// tutorial assumes a connection is made from
	// this existing file.
	include ("../include/db.php");


	// ==== Input validation and PHP dBase code ===============================
	//
	// ========================================================================

	if ( $_GET["register"] == "member" )
		{
		$bInputFlag = false;
		foreach ( $_POST as $field )
			{
			if ($field == "")
				{
				$bInputFlag = false;
				}
			else
				{
				$bInputFlag = true;
				}
			}
		// If we had problems with the input, exit with error
		if ($bInputFlag == false)
			{
			die( "Problem with your registration info. "
				."Please go back and try again.");
			}
		
		$s_date= date("F j, Y");
		//  Setup query
		$q = "INSERT INTO `tbl_members` (
		username, 
		password, 
		firstname, 
		middlename, 
		lastname, 
		gender, 
		email, 
		dob, 
		education, 
		website, 
		phone,
		mobile, 
		address, 
		city,
		country,
		joined_date
		) 
		
		VALUES (
		'$_POST[username]', 
		'$_POST[password]', 
		'$_POST[firstname]', 
		'$_POST[middlename]', 
		'$_POST[lastname]', 
		'$_POST[gender]', 
		'$_POST[email]', 
		'$_POST[dob]', 
		'$_POST[education]', 
		'$_POST[website]', 
		'$_POST[phone]',
		'$_POST[mobile]',
		'$_POST[address]', 
		'$_POST[city]',
		'$_POST[country]',
		'$s_date'
		)"; 


		//  Run query
		$r = mysql_query($q);
		
		// Make sure query inserted user successfully
		if ( !$r )
			{
			echo "Sorry <strong><font color=#FF0000>$_POST[firstname]</font></strong> we can't add your information in our Database..."
				."<br>Somebody has already used <strong><font color=#FF0000>$_POST[username]</font></strong> as his/her username."
				."<p>Try these words instead..."
				."<font color=#FF0000><ul>"
				."	<li>$_POST[username]_$_POST[lastname]</li>"
				."	<li>$_POST[firstname]_$_POST[lastname]</li>"
				."	<li>$_POST[username]_01</li>"
				."	<li>$_POST[username]_02</li>"
				."	<li>$_POST[username]_03</li>"
				."</ul></font>"
				."<hr size=1>"
				."<strong>Try once more</strong><p>
					<form action=\"login_form.php?SignUp=signup&&register=member\" method=\"POST\" onSubmit=\" return form_Validator(this)\">
					  <table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#ECECEC\" class=\"text\">
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Username <font color=\"#FF0000\">*</font></td>
						  <td><input name=\"username\" size=\"15\" maxlength=\"15\" id=\"uname\" class=\"formtext\"></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Password <font color=\"#FF0000\">*</font></td>
						  <td><input name=\"password\" type=\"password\" size=\"15\" maxlength=\"15\" id=\"passwd\" class=\"formtext\"></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>First Name <font color=\"#FF0000\">*</font></td>
						  <td><input name=\"firstname\" value=\"$_POST[firstname]\" size=\"20\" id=\"fname\" class=\"formtext\"></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Middle Initials</td>
						  <td><input name=\"middlename\" value=\"$_POST[middlename]\" size=\"10\" class=\"formtext\"></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Last Name <font color=\"#FF0000\">*</font></td>
						  <td><input name=\"lastname\" value=\"$_POST[lastname]\" size=\"20\" id=\"lname\" class=\"formtext\"></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Gender</td>
						  <td><select name=\"gender\" class=\"formtext\">
							  <option selected> </option>
							  <option>Male</option>
							  <option>Female</option>
							</select></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Email <font color=\"#FF0000\">*</font></td>
						  <td><input name=\"email\" value=\"$_POST[email]\" size=\"25\" id=\"email\" class=\"formtext\"></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Date of Birth <font color=\"#FF0000\">*</font></td>
						  <td><input name=\"dob\" value=\"$_POST[dob]\" size=\"20\" id=\"dob\" class=\"formtext\">
							Example: May 10, 1981</td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Education</td>
						  <td><select name=\"education\" class=\"formtext\">
							  <option selected> </option>
							  <option>SLC</option>
							  <option>Intermediate</option>
							  <option>Bachelor</option>
							  <option>Master</option>
					
							</select></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Website</td>
						  <td><input name=\"website\" value=\"$_POST[website]\" size=\"30\" class=\"formtext\" value=\"http://\"></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Telephone</td>
						  <td><input name=\"phone\" value=\"$_POST[phone]\" size=\"15\" class=\"formtext\"></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td>Mobile</td>
						  <td><input name=\"mobile\" value=\"$_POST[mobile]\" size=\"15\" class=\"formtext\"></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td valign=\"top\">Address <font color=\"#FF0000\">*</font></td>
						  <td><textarea name=\"address\" cols=\"30\" rows=\"4\" id=\"add\" class=\"formtext\">$_POST[address]</textarea></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\"> 
						  <td valign=\"top\">City <font color=\"#FF0000\">*</font></td>
						  <td><input name=\"city\" value=\"$_POST[city]\" size=\"15\" id=\"city\" class=\"formtext\"></td>
						</tr>
						<tr bgcolor=\"#FFFFFF\">
						  <td>Country <font color=\"#FF0000\">*</font></td>
						  <td><input name=\"country\" value=\"$_POST[country]\" size=\"15\" id=\"country\" class=\"formtext\"></td>
						</tr>
					  </table>
					  <p> 
						<input name=\"submit\" type=\"submit\" value=\"Register now\" class=\"formtext\">
					  </p>
					</form>	";
			}
		else
			{
			// Redirect to thank you page.
			include ("thanks.php");
			//header ("Location: thanks.php");
			}
		} // end if



	// ==== Thank you page ====================================================
	// 
	// ========================================================================
	elseif ( $_GET["op"] == "thanks" )
		{
		echo "<meta http-equiv=\"refresh\" content=\"1;URL=thanks.php\">";
		//echo "<h2>Thanks for registering!</h2>";
		}
		


	// ==== Main Form =========================================================
	//
	// ========================================================================
	else
		{
		echo "<strong>Register Now</strong><p>
		<form action=\"login_form.php?SignUp=signup&&register=member\" method=\"POST\" onSubmit=\" return form_Validator(this)\">
  <table width=\"100%\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#ECECEC\" class=\"text\">
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Username <font color=\"#FF0000\">*</font></td>
      <td><input name=\"username\" size=\"15\" maxlength=\"15\" id=\"uname\" class=\"formtext\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Password <font color=\"#FF0000\">*</font></td>
      <td><input name=\"password\" type=\"password\" size=\"15\" maxlength=\"15\" id=\"passwd\" class=\"formtext\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>First Name <font color=\"#FF0000\">*</font></td>
      <td><input name=\"firstname\" size=\"20\" id=\"fname\" class=\"formtext\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Middle Initials</td>
      <td><input name=\"middlename\" size=\"10\" class=\"formtext\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Last Name <font color=\"#FF0000\">*</font></td>
      <td><input name=\"lastname\" size=\"20\" id=\"lname\" class=\"formtext\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Gender</td>
      <td><select name=\"gender\" class=\"formtext\">
          <option selected> </option>
          <option>Male</option>
          <option>Female</option>
        </select></td>
    </tr>
	<tr bgcolor=\"#FFFFFF\"> 
      <td>Email <font color=\"#FF0000\">*</font></td>
      <td><input name=\"email\" size=\"25\" id=\"email\" class=\"formtext\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Date of Birth <font color=\"#FF0000\">*</font></td>
      <td><input name=\"dob\" size=\"20\" id=\"dob\" class=\"formtext\">
        Example: May 10, 1981</td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Education</td>
      <td><select name=\"education\" class=\"formtext\">
          <option selected> </option>
		  <option>SLC</option>
          <option>Intermediate</option>
          <option>Bachelor</option>
          <option>Master</option>

        </select></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Website</td>
      <td><input name=\"website\" size=\"30\" class=\"formtext\" value=\"http://\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Telephone</td>
      <td><input name=\"phone\" size=\"15\" class=\"formtext\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Mobile</td>
      <td><input name=\"mobile\" size=\"15\" class=\"formtext\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td valign=\"top\">Address <font color=\"#FF0000\">*</font></td>
      <td><textarea name=\"address\" cols=\"30\" rows=\"4\" id=\"add\" class=\"formtext\"></textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td valign=\"top\">City <font color=\"#FF0000\">*</font></td>
      <td><input name=\"city\" size=\"15\" id=\"city\" class=\"formtext\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td>Country <font color=\"#FF0000\">*</font></td>
      <td><input name=\"country\" size=\"15\" id=\"contry\" class=\"formtext\"></td>
    </tr>
  </table>
  <p> 
	<input name=\"submit\" type=\"submit\" value=\"Register now\" class=\"formtext\">
  </p>
</form>
		
		";
		}
	// EOF
	?>