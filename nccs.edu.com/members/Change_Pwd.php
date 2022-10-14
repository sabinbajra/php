<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}

	include ("../include/db.php");
	$query = "Select * from tbl_members where id = $_SESSION[valid_id]";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
?>
<script language="javascript">
<!-- 
function form_Validator(form)
{

  if (form.old_pwd.value == "")
  {
    alert("Please enter Old Password.");
    form.old_pwd.focus();
	return (false);
     }

  if (form.new_pwd.value == "")
  {
    alert("Please enter New Password.");
    form.new_pwd.focus();
	return (false);
     }

  if (form.retype_pwd.value == "")
  {
    alert("Please enter Retype Password.");
    form.retype_pwd.focus();
    return (false);
  }
  
  return (true);
  }
  //-->
</script>
<?
		echo "<form action=\"member.php?MemberPageID=Option&Opt=ENF&Action=Change\" method=\"post\" onSubmit=\" return form_Validator(this)\">";
		echo "<input type=\"hidden\" name=\"id\" value=\"$_SESSION[valid_id]\">"
			."<table width=\"500\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"table\" align=\"center\">"
			."  <tr>" 
			."	  <td class=\"title\"><img src=\"../images/icons/c_pwd.gif\" width=\"23\" height=\"22\" align=\"absmiddle\"> Change Password<hr size =\"1\" color=\"#c1cdd8\"></td>"
			."	</tr>"
			."	<tr>"
			."	  <td>"
			."		<table width=\"80%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" align=\"center\">"
			."  	  <tr>" 
			."			<td class=\"text\">Username</td>"
			."			<td class=\"text\"><strong>&nbsp;$show[username]</strong></td>"
			."  	  </tr>"
			."  	  <tr>" 
			."			<td class=\"text\">Old Password</td>"
			."			<td><input type=\"password\" name=\"old_pwd\" size=\"23\" maxlength=\"255\" id=\"old_pwd\" class=\"text_box\"></td>"
			."  	  </tr>"
			."  	  <tr>" 
			."			<td class=\"text\">New Password</td>"
			."			<td><input type=\"password\" name=\"new_pwd\" size=\"23\" maxlength=\"255\" id=\"new_pwd\" class=\"text_box\"></td>"
			."  	  </tr>"
			."  	  <tr>" 
			."			<td class=\"text\">Retype Password</td>"
			."			<td><input type=\"password\" name=\"retype_pwd\" size=\"23\" maxlength=\"255\" id=\"retype_pwd\" class=\"text_box\"></td>"
			."  	  </tr>"
			."  	  <tr>" 
			."			<td class=\"text\">&nbsp;</td>"
			."			<td><input type=submit name=submit value=\"Change Password\" class=\"text_box\"></td>"
			."  	  </tr>"
			."		</table>"
			."	  </td>"
			."  </tr>"
			."</table>";
?>