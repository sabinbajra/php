<?php
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
?>

<form action="?adminID=Management&Edit=EditMGMTenf&MGMT=Add" method="post">

<table width="50%" border="0">
  <tr>
    <td width="23%">Name</td>
    <td width="77%"><label>
      
        <div align="left">
          <input type="text" name="name" size="40" class="search_box1">
        </div>
    </label></td>
  </tr>
  <tr>
    <td>Post</td>
    <td><label>
      
        <div align="left">
           <input type="text" name="post" class="search_box1" size="40">
        </div>
    </label></td>
  </tr>
  <tr>
    <td width="50%"><label>
      <input type="submit" name="Submit" value="OK" class="login_box">
    </label>
      <label>
      <input type="reset" name="Submit2" value="Reset" class="login_box">
      </label></td>
    <td><label>
      <input type="button" name="Submit3" value="Back&lt;&lt;"  class="login_box"  onClick="javascript: history.back()">
    </label></td>
  </tr>
</table>
</form>