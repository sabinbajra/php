<?php
	include "../include/config.php";
?>
<html>
<head>
<title>Login Error - NCCS.CMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../include/bcis.css" rel="stylesheet" type="text/css">

</head>

<script language="javascript" src="../include/fvalid.js"></script>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php
	include "../include/header.inc";
?>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <tr valign="top"> 
    <td> <table width="100%" height="300" border="0" align="center" cellpadding="5" cellspacing="3">
        <tr> 
          <td height="23" valign="top" class="text"> <div align="right"><a href="../index.php">Home</a> 
              <hr size="1">
            </div></td>
        </tr>
        <tr> 
          <td valign="top" class="text1">
		  <?
		  	if ($SignUp == "register" || $SignUp == "signup") {
				include "$SignUp.php";
			}
			else if ($ForgotPassword == "forgot_password") {
				include "$ForgotPassword.php";
			}
			else {
				
		 ?>
            <table width="710" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
              <tr valign="top"> 
                <td width="490"><p><strong>Login Failed:</strong><br>
                    Either you have typed your uesrname or password worng... So 
                    you have to retype your login information again...</p>
                  <p><strong>Forgot Password:</strong><br>
                    If you have forgot your password then please <a href="login_form.php?ForgotPassword=forgot_password">click 
                  here</a> or you can click on directly on Forgot Password...</p>
                  <p>&nbsp;</p></td>
                <td width="9"></td>
				<td width="1" bgcolor="#CCCCCC"></td>
                <td width="210"> <p align="center"><font color="#FF0000"><strong>Login 
                    Error: Please login again</strong></font></p>
                  <p align="center"> 
                    <?
			echo "<form action=\"?login=member\" method=\"POST\" onSubmit=\" return form_Validator(this)\">"
			. "<table width='150' border='0' cellspacing='1' cellpadding='1' bgcolor='#F6F6F6' class='text'>"
			. "<tr>"
			. "<td colspan='2'>:: Login!</td>"
			. "</tr>"
			. "<tr bgcolor='#FFFFFF'>"
			. "<td colspan='2' height='8'></td>"
			. "</tr>"
			. "<tr bgcolor='#FFFFFF'>"
			. "<td>Username</td>"
			. "<td align='center'><input type=\"text\" name=\"username\" size=\"15\" id=\"uname\" class=\"login_box\"></td>"
			. "</tr>"
			. "<tr bgcolor='#FFFFFF'>"
			. "<td>Password</td>"
			. "<td align='center'><input type=\"password\" name=\"password\" size=\"15\" id=\"passwd\" class=\"login_box\"></td>"
			. "</tr>"
			. "<tr bgcolor='#FFFFFF'>"
			. "<td>&nbsp;</td>"
			. "<td align='right'><input type=\"submit\" value=\"Login\" class=\"login_box\">&nbsp;&nbsp;</td>"
			. "</tr>"
			. "<tr bgcolor='#FFFFFF'>"
			. "<td colspan='2' height='18'><a href=\"login_form.php?ForgotPassword=forgot_password\" class=\"small_lk\">Forgot Password?</td>"
			. "</tr>"
			. "</table>"
			. "</form>";
		?>
                  </p></td>
              </tr>
            </table>
            <?
		  	}
		  ?>
          </td>
        </tr>
      </table></td>
  </tr>
</table>
<?php include "../include/footer.inc";?>
</body>
</html>