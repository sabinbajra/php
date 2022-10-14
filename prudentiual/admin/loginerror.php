<!--form for admin creation -->
<html>
<head>
<title>Admin Login</title>
<link href="admin.css" rel="stylesheet" type="text/css"> 


<style type="text/css">
<!--
.style1 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
body {
	margin-top: 20%;
}
.style3 {
	font-size: xx-small;
	font-weight: bold;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
.style4 {color: #FF0000}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body>
<form name="loginform" method="post" action="?login=admin">
	<table width="200" border="0" align="center" cellpadding="5" cellspacing="10" bgcolor="#B8C8DC" bgc olor="#00FF00">
  
  <tr>
    <td colspan="2" valign="top" bgcolor="#B8C8DC"><div align="justify" class="style3"><span class="style4">LogInError:</span> Invalid username or Password. </div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" bgcolor="#FFFFFF"><div align="right"><img src="image/log.gif" width="30" height="30">
        <span class="style1">Admin Login</span></div></td>
    </tr>
  
  <tr>
    <td class="style1">Username</td>
    <td><label>
      <input type="text" name="username">
    </label></td>
  </tr>
  <tr>
    <td class="style1">Password</td>
    <td><label>
      <input type="password" name="password">
    </label></td>
  </tr>
  
  <tr>
    <td colspan="2"><label>
      <div align="center">
        <input type="submit" name="Submit" value="Submit" class="login_box">
        <input type="reset" name="Submit2" value="Reset" class="login_box">
        </div>
    </label></td>
    </tr>
</table>

</form>
</body>
</html>