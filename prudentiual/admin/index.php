<?php
	session_start();
	
	// dBase file
	//include "../include/db.php";

		if (isset($_GET["login"]) == "admin") {//if user clik the submit button
		
			if (!$_POST["username"] || !$_POST["password"]) //if no username or password is entered
			{
				die("Enter the complete information.Thank You  - sabin");
			}
			
				$dbc = mysqli_connect("localhost", "root", "", "prudential")
				or die ('Error connecting to MySQL server');
				// Create query to chek if the username or password matches
				$query = "SELECT * FROM `tbl_admin` WHERE `username`='$_POST[username]' AND `password`='$_POST[password]' LIMIT 1";
				//run the query
				$result=@mysqli_query ($query); //run the query
				$row=mysqli_fetch_array($result);
					
					if($row)  //user exists
 					{
					// Login O.K., create session variables
							$_SESSION["valid_id"] = $row[admin_id];
							$_SESSION["valid_user"] = $_POST["username"];
							Header("Location: admin.php");
					}
					
						else //if user nad password donot match
						{
							include "loginerror.php";
						}
				
			}
		
		else
		{
?>
<!-- -->
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
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body>
<form name="loginform" method="post" action="?login=admin">
	<table width="200" border="0" align="center" cellpadding="5" cellspacing="10" bgcolor="#B8C8DC" bgc olor="#00FF00">
  
  <tr>
    <td colspan="2" valign="top" bgcolor="#FFFFFF"><div align="right"><img src="images/log.gif" width="30" height="30">
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

<?php
}//end of else
?>