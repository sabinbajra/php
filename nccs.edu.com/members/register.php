<script>
// form fields description structure
var a_fields = {
	'username': {
		'l': 'Title',  // label
		'r': false,    // required
		'f': 'alpha',  // format (see below)
		't': 'username',// id of the element to highlight if input not validated
		
		'm': null,     // must match specified form field
		'mn': 2,       // minimum length
		'mx': 10       // maximum length
	},
	'username':{'l':'User Name','r':true,'f':'alphanum','t':'t_user_name'},	
	'password':{'l':'Pass Word','r':true,'f':'alphanum','t':'t_pass_word'},
	'firstname':{'l':'First Name','r':true,'f':'alpha','t':'t_first_name'},
	'lastname':{'l':'Last Name','r':true,'f':'alpha','t':'t_last_name'},
	'gender':{'l':'Gender','r':true,'t':'t_gender'},
	'email':{'l':'E-mail','r':true,'f':'email','t':'t_email'},
	//'dob':{'l':'Dob','r':true,'f':'dob','t':'t_dob'},
	'education':{'l':'Education','r':true,'t':'t_education'},
	'phone1':{'l':'Telephone Number','r':true,'f':'phone','t':'t_phone1'},	
	'address1':{'l':'Address','r':true,'t':'t_address1'},
	'city':{'l':'City','r':true,'f':'alpha','t':'t_city'},
	'country':{'l':'Country','r':true,'f':'alpha','t':'t_country'},
	'about_me':{'l':'About Me','r':true,'t':'t_about_me'},
	'hobbies':{'l':'Hobbies','r':true,'t':'t_hobbies'}
},

o_config = {
	'to_disable' : ['Submit', 'Reset'],
	'alert' : 1
}

// validator constructor call
var v = new validator('registration', a_fields, o_config);

</script>
<?php
	// dbConfig.php is a file that contains your
	// database connection information. This
	// tutorial assumes a connection is made from
	// this existing file.
	include ("include/db.php");


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
		$Profile_Count=1;
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
		phone1,
		phone2,
		mobile, 
		address1,
		address2, 
		city,
		country,
		fav_books,
		fav_movies,
		fav_artists,
		fav_musics,
		about_me,
		hobbies,
		hide_personal_details,
		joined_date,
		profile_view
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
		'$_POST[phone1]',
		'$_POST[phone2]',
		'$_POST[mobile]',
		'$_POST[address1]', 
		'$_POST[address2]',
		'$_POST[city]',
		'$_POST[country]',
		'$_POST[fav_books]', 
		'$_POST[fav_movies]',
		'$_POST[fav_artists]',
		'$_POST[fav_musics]',
		'$_POST[about_me]',
		'$_POST[hobbies]',
		'$_POST[hide_personal_details]',
		'$s_date',
		'$Profile_Count'
		)"; 


		//  Run query
		$r = mysql_query($q);
		
		// Make sure query inserted user successfully
		if ( !$r )
			{
			echo "
		<table width=\"778\" border=\"0\" cellspacing=\"3\" cellpadding=\"5\">
		  <tr>
			<td width=\"512\">
				<table width=\"512\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#ECECEC\" class=\"text\">
				  <tr bgcolor=\"#FFFFFF\"> 
					<td>
				Sorry <strong><font color=#FF0000>$_POST[firstname]</font></strong> we can't add your information in our Database...
								<br>Somebody has already used <strong><font color=#FF0000>$_POST[username]</font></strong> as his/her username.
								<p>Try these words instead...
								<font color=#FF0000><ul>"
								."	<li>".STRTOLOWER($_POST[username])."_". STRTOLOWER($_POST[firstname])."</li>"
								."	<li>".STRTOLOWER($_POST[firstname])."_".STRTOLOWER($_POST[lastname])."</li>"
								."	<li>".STRTOLOWER($_POST[firstname])."_".STRTOLOWER($_POST[username])."</li>"
								."	<li>".STRTOLOWER($_POST[username])."_01</li>"
								."	<li>".STRTOLOWER($_POST[username])."_02</li>"
								."</ul></font>
					 </td>
				  </tr>
				</table>
				<hr size=1>
				<span class=\"title\">Register</span><p>		
				<center>
				<form action=\"?pageID=register&&register=member\" method=\"POST\" name=\"registration\" onSubmit=\"return v.exec()\">
  <table width=\"512\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#ECECEC\" class=\"text\">
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_user_name\">Username <font color=\"#FF0000\">*</font></td>
      <td><input name=\"username\" size=\"15\" maxlength=\"15\" id=\"uname\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_pass_word\">Password <font color=\"#FF0000\">*</font></td>
      <td><input name=\"password\" type=\"password\" size=\"15\" maxlength=\"15\" id=\"passwd\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_first_name\">First Name <font color=\"#FF0000\">*</font></td>
      <td><input name=\"firstname\" size=\"20\" id=\"fname\" value=\"$_POST[firstname]\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Middle Name</td>
      <td><input name=\"middlename\" size=\"10\" value=\"$_POST[middlename]\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_last_name\">Last Name <font color=\"#FF0000\">*</font></td>
      <td><input name=\"lastname\" size=\"20\" id=\"lname\" value=\"$_POST[lastname]\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_gender\">Gender <font color=\"#FF0000\">*</font></td>
      <td><select name=\"gender\" class=\"sign_up\">
		  <option value=\"$_POST[gender]\" selected>$_POST[gender]</option>
		  <option>--------</option>
          <option>Male</option>
          <option>Female</option>
        </select></td>
    </tr>
	<tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_email\">E-mail <font color=\"#FF0000\">*</font></td>
      <td><input name=\"email\" size=\"25\" id=\"email\" value=\"$_POST[email]\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_dob\">Date of Birth <font color=\"#FF0000\">*</font></td>
      <td><input name=\"dob\" size=\"20\" id=\"dob\" value=\"$_POST[dob]\" class=\"sign_up\">
        Example: May 10, 1981</td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_education\">Education <font color=\"#FF0000\">*</font></td>
      <td><select name=\"education\" class=\"sign_up\">
		  <option value=\"$_POST[education]\" selected>$_POST[education]</option>
		  <option>--------</option>
		  <option>SLC</option>
          <option>Intermediate</option>
          <option>Bachelor</option>
          <option>Master</option>
		  <option>Others</option>
        </select></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Website</td>
      <td><input name=\"website\" size=\"30\" class=\"sign_up\" value=\"$_POST[website]\" value=\"http://\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_phone1\">Telephone 1 <font color=\"#FF0000\">*</font></td>
      <td><input name=\"phone1\" size=\"15\" value=\"$_POST[phone1]\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Telephone 2</td>
      <td><input name=\"phone2\" size=\"15\" value=\"$_POST[phone2]\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Mobile</td>
      <td><input name=\"mobile\" size=\"15\" value=\"$_POST[mobile]\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_address1\" valign=\"top\">Place <font color=\"#FF0000\">*</font></td>
      <td><textarea name=\"address1\" cols=\"30\" rows=\"4\" id=\"add1\" class=\"sign_up\">".stripslashes($_POST[address1])."</textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td valign=\"top\">Home Town</td>
      <td><textarea name=\"address2\" cols=\"30\" rows=\"4\" id=\"add1\" class=\"sign_up\">".stripslashes($_POST[address2])."</textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_city\" valign=\"top\">City <font color=\"#FF0000\">*</font></td>
      <td><input name=\"city\" size=\"15\" id=\"city\" value=\"$_POST[city]\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td id=\"t_country\">Country <font color=\"#FF0000\">*</font></td>
      <td><input name=\"country\" size=\"15\" id=\"contry\" value=\"$_POST[country]\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td valign=\"top\">Favourite Book(s)</td>
      <td><textarea name=\"fav_books\" cols=\"30\" rows=\"4\" id=\"fav_books\"  class=\"sign_up\">".stripslashes($_POST[fav_books])."</textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td valign=\"top\">Favourite Movie(s)</td>
      <td><textarea name=\"fav_movies\" cols=\"30\" rows=\"4\" id=\"fav_movies\" class=\"sign_up\">".stripslashes($_POST[fav_movies])."</textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td valign=\"top\">Favourite Artist(s)</td>
      <td><textarea name=\"fav_artists\" cols=\"30\" rows=\"4\" id=\"fav_artists\" class=\"sign_up\">".stripslashes($_POST[fav_artists])."</textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td valign=\"top\">Favourite Music(s)</td>
      <td><textarea name=\"fav_musics\" cols=\"30\" rows=\"4\" id=\"fav_musics\" class=\"sign_up\">".stripslashes($_POST[fav_musics])."</textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td id=\"t_about_me\" valign=\"top\">About Me <font color=\"#FF0000\">*</font></td>
      <td><textarea name=\"about_me\" cols=\"30\" rows=\"4\" id=\"about_me\" class=\"sign_up\">".stripslashes($_POST[about_me])."</textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td id=\"t_hobbies\" valign=\"top\">Hobbies <font color=\"#FF0000\">*</font></td>
      <td><textarea name=\"hobbies\" cols=\"30\" rows=\"4\" id=\"hobbies\" class=\"sign_up\">".stripslashes($_POST[hobbies])."</textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td valign=\"top\"></td>
      <td><input type=\"radio\" name=\"hide_personal_details\" value=\"1\"> Hide Personal details.<br>
	      <input type=\"radio\" name=\"hide_personal_details\" value=\"0\"> Unhide Personal details.</td>
    </tr>
  </table>
  <p> 
	<input name=\"submit\" type=\"submit\" value=\"Register now\" class=\"sign_up\">
  </p>
</form>
</center>
			</td>
			<td valign=\"top\" width\"250\" class=\"text\"><strong>Note:</strong> Fields with <font color=\"#FF0000\">*</font> are Mandatory...<p>
<strong>Hide/Unhide Personal Details:</strong><br>You can Hide or Unhide your personal details (E-mail, Dob, Phone, Mobile, Address).
			</td>
		  </tr>
		</table>	";
			}
		else
			{
			$To			=	trim($_POST['username']);//to username
			$From		=	"bcisn2k5";
			$Curr_Date	=	time();	
			$Subject	=	"Welcome";
			$MSG = "<b>CHAO FRENZ!</b><p>
			Welcome to the wonders of I.T  and cope this 21st century  as being the student from the 3rd world and share your knowledge and memoirs with us.<p>
			Thanking you for comin in this friends circle and hope we can do a lot to remark youth of this era in the tallest country NEPAL.Have fun and enjoy the trip with our company!!!!!
			Your articles will worth us too much so we expect that assistance from you.
			<p>Thank you!!!!
			";
			$Message_checked = 0;

			$MsgQuery = "INSERT INTO tbl_message(to_member,from_member,rec_date,subject,message,msg_checked) VALUES ('$To','$From','$Curr_Date','$Subject','$MSG','$Message_checked')";
			$MsgRun = mysql_query($MsgQuery);
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
		echo "<meta http-equiv=\"refresh\" content=\"1;URL=thanks.php?login=member\">";
		//echo "<h2>Thanks for registering!</h2>";
		}
		


	// ==== Main Form =========================================================
	//
	// ========================================================================
	else
		{
		echo "&nbsp;<span class=\"title\">Register Now</span><p>
		<table width=\"778\" border=\"0\" cellspacing=\"3\" cellpadding=\"5\">
		  <tr>
			<td width=\"512\">
					<center>
					<form action=\"?pageID=register&&register=member\" method=\"POST\" name=\"registration\" onSubmit=\"return v.exec()\">
  <table width=\"512\" border=\"0\" cellpadding=\"3\" cellspacing=\"1\" bgcolor=\"#ECECEC\" class=\"text\">
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_user_name\">Username <font color=\"#FF0000\">*</font></td>
      <td><input name=\"username\" size=\"15\" maxlength=\"15\" id=\"uname\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_pass_word\">Password <font color=\"#FF0000\">*</font></td>
      <td><input name=\"password\" type=\"password\" size=\"15\" maxlength=\"15\" id=\"passwd\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_first_name\">First Name <font color=\"#FF0000\">*</font></td>
      <td><input name=\"firstname\" size=\"20\" value=\"$_POST[firstname]\" id=\"fname\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Middle Name</td>
      <td><input name=\"middlename\" size=\"10\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_last_name\">Last Name <font color=\"#FF0000\">*</font></td>
      <td><input name=\"lastname\" size=\"20\" id=\"lname\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_gender\">Gender <font color=\"#FF0000\">*</font></td>
      <td><select name=\"gender\" class=\"sign_up\">
          <option value=\"\" selected> </option>
          <option value=\"Male\">Male</option>
          <option value=\"Female\">Female</option>
        </select></td>
    </tr>
	<tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_email\">Email <font color=\"#FF0000\">*</font></td>
      <td><input name=\"email\" size=\"25\" id=\"email\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_dob\">Date of Birth <font color=\"#FF0000\">*</font></td>
      <td><input name=\"dob\" size=\"20\" id=\"dob\" class=\"sign_up\">
        Example: May 10, 1981</td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_education\">Education <font color=\"#FF0000\">*</font></td>
      <td><select name=\"education\" class=\"sign_up\">
          <option value=\"\" selected> </option>
		  <option value=\"SLC\">SLC</option>
          <option value=\"Intermediate\">Intermediate</option>
          <option value=\"Bachelor\">Bachelor</option>
          <option value=\"Master\">Master</option>
		  <option value=\"Others\">Others</option>
        </select></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Website</td>
      <td><input name=\"website\" size=\"30\" class=\"sign_up\" value=\"http://\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_phone1\">Telephone 1 <font color=\"#FF0000\">*</font></td>
      <td><input name=\"phone1\" size=\"15\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Telephone 2</td>
      <td><input name=\"phone2\" size=\"15\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td>Mobile</td>
      <td><input name=\"mobile\" size=\"15\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_address1\" valign=\"top\">Place <font color=\"#FF0000\">*</font></td>
      <td><textarea name=\"address1\" cols=\"30\" rows=\"4\" id=\"add\" class=\"sign_up\"></textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td valign=\"top\">Home Town</td>
      <td><textarea name=\"address2\" cols=\"30\" rows=\"4\" id=\"add\" class=\"sign_up\"></textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\"> 
      <td id=\"t_city\" valign=\"top\">City <font color=\"#FF0000\">*</font></td>
      <td><input name=\"city\" size=\"15\" id=\"city\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td id=\"t_country\">Country <font color=\"#FF0000\">*</font></td>
      <td><input name=\"country\" size=\"15\" id=\"contry\" class=\"sign_up\"></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td valign=\"top\">Favourite Book(s)</td>
      <td><textarea name=\"fav_books\" cols=\"30\" rows=\"4\" id=\"fav_books\" class=\"sign_up\"></textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td valign=\"top\">Favourite Movie(s)</td>
      <td><textarea name=\"fav_movies\" cols=\"30\" rows=\"4\" id=\"fav_movies\" class=\"sign_up\"></textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td valign=\"top\">Favourite Artist(s)</td>
      <td><textarea name=\"fav_artists\" cols=\"30\" rows=\"4\" id=\"fav_artists\" class=\"sign_up\"></textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td valign=\"top\">Favourite Music(s)</td>
      <td><textarea name=\"fav_musics\" cols=\"30\" rows=\"4\" id=\"fav_musics\" class=\"sign_up\"></textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td id=\"t_about_me\" valign=\"top\">About Me <font color=\"#FF0000\">*</font></td>
      <td><textarea name=\"about_me\" cols=\"30\" rows=\"4\" id=\"about_me\" class=\"sign_up\"></textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td id=\"t_hobbies\" valign=\"top\">Hobbies <font color=\"#FF0000\">*</font></td>
      <td><textarea name=\"hobbies\" cols=\"30\" rows=\"4\" id=\"hobbies\" class=\"sign_up\"></textarea></td>
    </tr>
    <tr bgcolor=\"#FFFFFF\">
      <td valign=\"top\"></td>
      <td><input type=\"radio\" name=\"hide_personal_details\" value=\"1\"> Hide Personal details.<br>
	      <input type=\"radio\" name=\"hide_personal_details\" value=\"0\"> Unhide Personal details.</td>
    </tr>
  </table>
  <p> 
	<input name=\"submit\" type=\"submit\" value=\"Register now\" class=\"sign_up\">
  </p>
</form>
</center>
			</td>
			<td valign=\"top\" width\"250\" class=\"text\"><strong>Note:</strong> Fields with <font color=\"#FF0000\">*</font> are Mandatory...<p>
<strong>Hide/Unhide Personal Details:</strong><br>You can Hide or Unhide your personal details (E-mail, Dob, Phone, Mobile, Address).<p><center>
<img src=\"images/rand/add.jpg\" width=\"178\" height=\"599\" alt=\"Your Add Here...\"></center>
			</td>
		  </tr>
		</table>
		";
		}
	// EOF
	?>