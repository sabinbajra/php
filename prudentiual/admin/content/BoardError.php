<?php
//this include for the edit of Board of dierectors

	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	//for image upload
	
	
?>

<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>

<?

include ("../include/db.php");
$query = "select * from tbl_bod where bod_id=$_GET[id]";
$result = mysql_query($query);
$bod = mysql_fetch_array($result);

?>



<form action="?adminID=BOD&Edit=EditBODenf&BOD=Modify&id=<?= $bod['bod_id'] ?>" method="post" enctype="multipart/form-data">

<table width="65%" border="0">

<tr>
<td colspan="2">
	<span class="style1">Modify BOD.</span></td>
</tr>

  <tr>
    <td width="33%">Name</td>
    <td width="67%"><label>
      
        <div align="left">
          <input type="text" name="names" size="40" class="search_box1" value="<?= $bod['Name']?>">
        </div>
    </label></td>
  </tr>
  
  <tr>
    <td>Post</td>
    <td><label>
      
        <div align="left">
           <input type="text" name="post" class="search_box1" size="40" value="<?= $bod['Post']?>">
        </div>
    </label></td>
  </tr>
  
  <tr>
    <td width="33%">Company</td>
    <td width="67%"><label>
      
        <div align="left">
          <input type="text" name="company" size="40" class="search_box1" value="<?= $bod['Company']?>">
        </div>
    </label></td>
  </tr>
  
  <tr>
    <td>Elected From </td>
    <td><label>
      
        <div align="left">
           <input type="text" name="efrom" class="search_box1" size="40" value="<?= $bod['electfrom']?>">
        </div> 
    </label><br /></td>
  </tr>
  
  <tr>
    <td width="33%">
      
	  Image</td>
    <td>
	<span class="style1">Image file already exists.Thank You.</span>	
	  <input  type="file" size="20" name="upload" class="search_box1"/><br />
	  <span class="style1">Image of size less than 100 X 100 px. Thank You.</span>	  </td>
	  </tr>
  
  <tr>
    <td width="33%">
      <input type="submit" name="Submit" value="OK" class="login_box">
    
      <input type="reset" name="Submit2" value="Reset" class="login_box">
	  
    </td>
	  <td>
	  <label>
      <input type="button" name="Submit3" value="Back&lt;&lt;"  class="login_box"  onClick="javascript: history.back()">
    </label></td>
  </tr>
	  
	  
</table>