<?php
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	// Get Full Name
	include "../include/db.php";
	$GET_NAME = mysql_query("SELECT firstname, middlename, lastname from tbl_members WHERE id=$_SESSION[valid_id]");
	$GET_ARRAY = mysql_fetch_array($GET_NAME);
	if (empty($GET_ARRAY["middlename"])) {
		$PostName = $GET_ARRAY["firstname"] . " " . $GET_ARRAY["lastname"];
	}
	else {
		$PostName = $GET_ARRAY["firstname"] . " " . $GET_ARRAY["middlename"] . " " . $GET_ARRAY["lastname"];
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
          <td width="20%" bgcolor="#fafafa">File Upload Path:</td>
          <td width="80%" colspan="3" bgcolor="#fafafa"><a href="<?=$base_dir;?>" target="_blank"><?php echo $path; ?></a></td>
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
							$name = trim($_POST['name']);
							$name = addslashes($name);
							$description	=	trim($_POST['description']);
							$description	=	addslashes($description);
							$description	=	str_replace("\n","<BR>",$description);
							$submitted_by	=	trim($_POST['PostName']);
							$submitted_by	=	addslashes($submitted_by);
							$s_date= date("F j, Y");
							$mem_id = $_POST['PostID'];
							$query = "INSERT INTO tbl_note (sub_name, sub_desc, sub_file, sub_sem, submitted_by, submitted_on, mem_id) VALUES ('$name', '$description', '$fname', '$_POST[sem]', '$submitted_by', '$s_date', '$mem_id')"; 
							$result = mysql_query($query);
							echo "<br><span class=\"text\">Note: <font color=\"#FF0000\"><strong>".$name."</strong></font></span><br><span class=\"text\">Filename: <font color=\"#FF0000\"><strong>".$fname."</strong></font> was success fully uploaded!</span><br>";
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
                    <form action="<?=$_SERVER['PHP_SELF']."?MemberPageID=NotePOST";?>" method="post" enctype="multipart/form-data" name="note_post" onSubmit="return form_Validator(this)">
					<input type="hidden" name="PostName" value="<?=$PostName;?>"/>
					<input type="hidden" name="PostID" value="<?=$_SESSION["valid_id"];?>"/>
                      <table width="494" border="0" align="center" cellpadding="2" cellspacing="1" id="uploadtable">
                        <tr>
                          <td width="81" class="text">&nbsp;</td>
                          <td width="73%" class="text"><div align="right"><strong>For </strong></div></td>
                          <td width="103"><div align="right">
                              <select name="sem" id="select" class="text_box">
                                <?
								if ($_POST) {
									echo "<option value=\"$_POST[sem]\" selected>$_POST[sem]</option>";
								}
								else  {
									echo "<option selected>Select One</option>";
								}
								?>
                                <option>---</option>
                                <option>11</option>
                                <option>12</option>
                                
                              </select>
                          </div></td>
                        </tr>
                        <tr>
                          <td width="81" class="text"><strong>Sub Name</strong></td>
                          <td colspan="2"><input name="name" type="text" class="text_box" value="<?=$_POST['name']?>" id="name" size="65" /></td>
                        </tr>
                        <tr>
                          <td width="81" valign="top" class="text"><strong>Description</strong></td>
                          <td colspan="2"><strong>
                            <textarea name="description" cols="64" rows="6" class="text_box" id="description"><?=$_POST['description']?></textarea>
                          </strong></td>
                        </tr>
                        <tr>
                          <td class="text"><strong>File</strong></td>
                          <td colspan="2"><input name="upload" type="file" class="text_box" size="53" /></td>
                        </tr>
                        <tr>
                          <td class="text">&nbsp;</td>
                          <td colspan="2"><input type="submit" name="Submit2" value="Submit" class="text_box"></td>
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