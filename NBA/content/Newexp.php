<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: index.php");
		}

	include ("include/db.php");
	$query = "Select * from tbl_login where idtbl_login = $_SESSION[valid_id]";
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

		echo "<form action=\"main.php?AdminPageID=NewexpenseHead&Opt=NewexpenseHead_Enf&Action=NEW\" method=\"post\" onSubmit=\" return form_Validator(this)\">"
		."<table width=\"510\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"table\" align=\"center\">"
			."  <tr>" 
			."	  <td class=\"title\">New Expenses Heading<hr size =\"1\" color=\"#c1cdd8\"></td>"
			."	</tr>"
			."	<tr>"
			."	  <td>"
			."		<table width=\"80%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" align=\"center\">"
			."  	  <tr>" 
			."			<td class=\"text\">Heading</td>"
			."			<td><input type=\"heading\" name=\"heading\" size=\"23\" maxlength=\"255\" id=\"heading\" class=\"text_box\"></td>"
			."  	  </tr>"
			."  	  <tr>" 
			."			<td class=\"text\">Description</td>"
			."			<td> <textarea name=\"description\" cols=\"30\" rows=\"5\" class=\"text_box1\" id=\"description\"></textarea></td>"
			."  	  </tr>"
			."  	  <tr>" 
			."			<td class=\"text\">&nbsp;</td>"
			."			<td><input type=submit name=submit value=\"New Heading\" class=\"text_box\"></td>"
			."  	  </tr>"
			."		</table>"
			."	  </td>"
			."  </tr>"
			."</table>";
?>