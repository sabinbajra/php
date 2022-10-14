<?php
//this page included for the edit of the management
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
?>

<?

include ("../include/db.php");
$query = "select * from tbl_mgmt where mgmt_id=$_GET[id]";
$result = mysql_query($query);
$mgmt = mysql_fetch_array($result);
?>
<form action="?adminID=Management&Edit=EditMGMTenf&MGMT=Modify&id=<?=$_GET['id'];?>" method="post">

<table width="50%" border="0">
  <tr>
    <td width="23%">Name</td>
    <td width="77%"><label>
      
        <div align="left">
          <input type="text" name="name" value="<?php echo $mgmt['Name']; ?>" size="40" class="search_box1">
        </div>
    </label></td>
  </tr>
  <tr>
    <td>Post</td>
    <td><label>
      
        <div align="left">
           <input type="text" name="post" value="<?php echo $mgmt['Post']; ?>" class="search_box1" size="40">
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