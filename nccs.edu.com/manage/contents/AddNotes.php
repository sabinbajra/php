<?php
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	// Get Dir Path
	$path='contents/notes/';
	$base_dir='../contents/notes/';
?>
<script language="javascript">
<!-- 
function form_Validator(form) {
	if (form.name.value == "") {
		alert("Please enter Subject Name.");
		form.name.focus();
		return (false);
	}
	if (form.description.value == "") {
		alert("Please enter Description/Notes.");
		form.description.focus();
		return (false);
	}
	return (true);
}
//-->
</script>
<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#f7f7f7">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
        <tr bgcolor="#FFFFFF" class="text"> 
          <td width="14%" bgcolor="#fafafa">File Upload Path:</td>
          <td width="86%" colspan="3" bgcolor="#fafafa"><a href="<?=$base_dir;?>" target="_blank"><?php echo $path; ?></a></td>
        </tr>
        <tr bgcolor="#FFFFFF" class="text"> 
          <td colspan="4"><strong>Note</strong>: Can upload <strong>.doc</strong>, 
            <strong>.pdf</strong>, <strong>.txt</strong>, <strong>.exe</strong>, 
            <strong>.zip</strong>, <strong>.gif</strong>, <strong>.jpg</strong>. 
          </td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <td colspan="4"> 
            <?php
				if ($_POST['sem'] == "Select One" || $_POST['sem'] == "---") {
					echo "<span class=\"text\"><font color=\"#FF0000\"><strong>Error:</strong></font> Please select Semester!</span>";
				}
				else {
					if(isset($HTTP_POST_FILES["upload"]) && $HTTP_POST_FILES["upload"]["name"] != "") {			
						echo "<span class=\"text\">Upload Status...</span>";
						$fname=$HTTP_POST_FILES["upload"]["name"];
						$tname=$HTTP_POST_FILES["upload"]["tmp_name"];
						// if($fname=="")continue;
						if(file_exists($base_dir."/".$fname)) {
							echo "<br><span class=\"text\"><font color=\"#FF0000\"><strong>".$fname."</strong></font> could not be uploaded. File already exists!!! </span><br>";
						}
						elseif(move_uploaded_file($tname, $base_dir."/".$fname)) {
							include ("../include/db.php");
							$sub_name = trim($_POST['sub_name']);
							$sub_name = addslashes($sub_name);
							$desc	=	trim($_POST['desc']);
							$desc	=	addslashes($desc);
							$desc	=	str_replace("\n","<BR>",$desc);
							$sem	=	$_POST['sem'];
							$sub_by	=	trim($_POST['sub_by']);
							$sub_by	=	addslashes($sub_by);
							$s_date= date("F j, Y");
							$mem_id = 0;
							$query = "INSERT INTO tbl_note (sub_name, sub_desc, sub_file, sub_sem, submitted_by, submitted_on, mem_id) VALUES ('$sub_name', '$desc', '$fname', '$sem', '$sub_by', '$s_date', '$mem_id')"; 
							$result = mysql_query($query);
							echo "<br><span class=\"text\">Note: <font color=\"#FF0000\"><strong>".$sub_name."</strong></font></span><br><span class=\"text\">Filename: <font color=\"#FF0000\"><strong>".$fname."</strong></font> was success fully uploaded!</span><br>";
						}
						else {
							echo "<br><span class=\"text\"><font color=\"#FF0000\"><strong>".$fname."</strong></font> could not be uploaded !!! </span>";
						}
					} // end if (isset)
				}
			?>
          </td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <td colspan="4"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
              <tr> 
                <td><center>
                    <form action="<?=$_SERVER['PHP_SELF']."?AdminPageID=Contents&List=ListingDB&AddDB=AddNotes";?>" method="post" enctype="multipart/form-data" name="note_post" onSubmit="return form_Validator(this)">
                      <table width="85%" border="0" cellspacing="1" cellpadding="3" align="center">
                        <tr>
                          <td class="text">Semester</td>
                          <td class="text"><select name="sem" id="select" class="search_box1">
						  <?
							if ($_POST) {
								echo "<option value=\"$_POST[sem]\" selected=\"selected\">$_POST[sem]</option>";
								echo "<option>---</option>";
							}
						  ?>
							  <option>1st</option>
							  <option>2nd</option>
							  <option>3rd</option>
							  <option>4th</option>
							  <option>5th</option>
							  <option>6th</option>
							  <option>7th</option>
							  <option>8th</option>
						  </select>
                          </td>
                        </tr>
                        <tr>
                          <td class="text">Sub Name </td>
                          <td class="text"><input type="text" name="sub_name" size="100" value="<?=$_POST['sub_name']?>" class="search_box1" /></td>
                        </tr>
                        <tr>
                          <td class="text" valign="top">Description</td>
                          <td><textarea name="desc" cols="100" rows="8" class="search_box1"><?=str_replace("<BR>","\n",stripslashes($_POST['desc']));?></textarea></td>
                        </tr>
                        <tr>
                          <td class="text">Submitted by</td>
                          <td class="text"><input type="text" name="sub_by" size="100" value="<?=$_POST['sub_by'];?>" class="search_box1" /></td>
                        </tr>
						<tr>
                          <td class="text">File</td>
                          <td><input name="upload" type="file" class="search_box1" size="86" /></td>
                        </tr>
                        <tr>
                          <td valign="top" class="text">&nbsp;</td>
						  <td><input type="submit" name="Submit" value="Submit" class="search_box1">
						  <input type="button" name="Submit" value="List Notes" onClick="window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=Notes'" class="search_box1">
						  </td>
                        </tr>
                      </table>
                    </form>
                  </center></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>