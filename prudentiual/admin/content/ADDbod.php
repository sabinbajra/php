<?php
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


<form action="?adminID=BOD&Edit=EditBODenf&BOD=Add" method="post" enctype="multipart/form-data">

<table width="65%" border="0">

<tr>
<td colspan="2">
	<span class="style1">Add New BOD details.</span></td>
</tr>

  <tr>
    <td width="33%">Name</td>
    <td width="67%"><label>
      
        <div align="left">
          <input type="text" name="names" size="40" class="search_box1">
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
    <td width="33%">Company</td>
    <td width="67%"><label>
      
        <div align="left">
          <input type="text" name="company" size="40" class="search_box1">
        </div>
    </label></td>
  </tr>
  
  <tr>
    <td>Elected From </td>
    <td><label>
      
        <div align="left">
           <input type="text" name="efrom" class="search_box1" size="40">
        </div>
    </label><br /></td>
  </tr>
  
  <tr>
    <td width="33%">
      
	  Image</td>
    <td>
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