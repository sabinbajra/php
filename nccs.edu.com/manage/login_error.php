<html>
<head>
<title>Login Error!</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="include/admin.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" src="include/form_validator.js"></script>
</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="center" valign="middle"><span class="text"><strong><font color="#FF0000">Login Error:</font></strong> 
      Invalid Username or Password!</span> 
      <table width="314" height="210" border="0" align="center" cellpadding="0" cellspacing="0" id="Login">
        <tr> 
          <td> <img src="images/index_01.gif" width="26" height="30" alt=""></td>
          <td> <img src="images/index_02.jpg" width="262" height="30" alt=""></td>
          <td> <img src="images/index_03.gif" width="26" height="30" alt=""></td>
        </tr>
        <tr> 
          <td> <img src="images/index_04.gif" width="26" height="153" alt=""></td>
          <td width="262" height="153" background="images/index_05.gif"> 
            <?php
					echo"<form name=\"loginform\" method=\"post\" action=\"?login=admin\" onSubmit=\"return form_Validator(this)\">"
						." <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">"
						."  <tr> "
						."	<td width=\"8%\">&nbsp;</td>"
						."	<td width=\"40%\">&nbsp;</td>"
						."	<td width=\"52%\">&nbsp;</td>"
						."  </tr>"
						."  <tr> "
						."	<td class=\"contents\">&nbsp;</td>"
						."	<td><strong>Username</strong></td>"
						."	<td><input name=\"username\" type=\"text\" id=\"uname\" class=\"login_box\" size=\"18\"></td>"
						."  </tr>"
						."  <tr> "
						."	<td class=\"contents\">&nbsp;</td>"
						."	<td><strong>Password</strong></td>"
						."	<td><input name=\"password\" type=\"password\" id=\"passwd\" class=\"login_box\" size=\"18\"></td>"
						."  </tr>"
						."  <tr> "
						."	<td colspan=\"3\" height=\"9\"></td>"
						."  </tr>"
						."  <tr> "
						."	<td>&nbsp;</td>"
						."	<td>&nbsp;</td>"
						."	<td><input name=\"Submit\" type=\"submit\" class=\"login_box\" value=\"Submit\"></td>"
						."  </tr>"
						." </table>"
					  ."</form>";
				?>
          </td>
          <td> <img src="images/index_06.gif" width="26" height="153" alt=""></td>
        </tr>
        <tr> 
          <td> <img src="images/index_07.gif" width="26" height="27" alt=""></td>
          <td> <img src="images/index_08.gif" width="262" height="27" alt=""></td>
          <td> <img src="images/index_09.gif" width="26" height="27" alt=""></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
