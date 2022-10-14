<?php
	// connect database
	include ("../include/db.php");
	$s_date= date("F j, Y");
	?>
	<form action="?AdminPageID=Staffs&New=RegisterENF&Staff=Add" method="POST" enctype="multipart/form-data" onSubmit=" return form_Validator(this)">
	  <input type="hidden" name="id" value="<?=$show['id'];?>" />
		<table width="750" border="0" align="center" cellpadding="5" cellspacing="1" class="table">
		  <tr> 
			<td class="text" width="166">Designation <font color="#FF0000">*</font></td>
			<td width="561"><input name="desig" size="20" maxlength="15" id="regno" class="search_box1"></td>
		  </tr>
		  <tr bgcolor="#FFFFFF"> 
			<td class="text">Education <font color="#FF0000">*</font></td>
			<td><input name="edu" size="20" id="edu" class="search_box1"></td>
		  </tr>
		  <tr bgcolor="#FFFFFF">
			<td class="text">Job Type</td>
			<td><select name="jb_tp" id="jb_tp" class="search_box1">
                <option selected="selected">Full</option>
                <option>Part</option>
            </select></td>
		  </tr>
		  <tr bgcolor="#FFFFFF">
			<td class="text">Salary <font color="#FF0000">*</font></td>
			<td><input name="sal" size="20" id="sal" class="search_box1"></td>
		  </tr>
		  <tr bgcolor="#FFFFFF">
			<td class="text">Join On <font color="#FF0000">*</font></td>
			<td><input name="jd_dt" size="20" value="<?=$s_date;?>" id="ad_dt" class="search_box1"></td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td><input name="submit" type="submit" value="Submit" class="search_box1"></td>
		  </tr>
		</table>
		</form>