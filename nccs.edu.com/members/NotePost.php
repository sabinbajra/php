<?php
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: index.php");
	}

	$path='contents/dnld_scpts_tutos/';
	$base_dir='../contents/dnld_scpts_tutos/';
?>
<script language="JavaScript">
function form_Validator(form) {
	if (form.st_name.value == "") {
		alert("Enter Title's / Name.");
		form.st_name.focus();
		return (false);
	}
	if (form.description.value == "") {
		alert("Enter Description / Text Notes.");
		form.description.focus();
		return (false);
	}
return (true);
}
</script>
<br>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="f7f7f7">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
        <tr bgcolor="#FFFFFF" class="text"> 
          <td width="15%" bgcolor="#fafafa">File Upload Path:</td>
          <td width="85%" colspan="3" bgcolor="#fafafa"><a href="../contents/dnld_scpts_tutos/" target="_blank"><?php echo $path; ?></a></td>
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
						$description	=	trim($_POST['description']);
						$description	=	addslashes($description);
						$description	=	str_replace("\n","<BR>",$description);
						$s_date= date("F j, Y");
						$query = "INSERT INTO tbl_notes (name, filename, description, submitted_on) VALUES ('$st_name', '$fname', '$description', '$s_date')"; 
						$result = mysql_query($query);
	                    echo "<br><span class=\"text\">Scripts/Tutorials: <font color=\"#FF0000\"><strong>".$filmname."</strong></font> was success fully uploaded !!! </span><br><span class=\"text\">Filename: <font color=\"#FF0000\"><strong>".$fname."</strong></font> was success fully uploaded !!! </span><br>";
	                }
					else {
	                	echo "<br><span class=\"text\"><font color=\"#FF0000\"><strong>".$fname."</strong></font> could not be uploaded !!! </span>";
	                }

				} // end if (isset)
			?>
          </td>
        </tr>
        <tr bgcolor="#FFFFFF"> 
          <td colspan="4"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
              <tr> 
                <td><center>
                    <form action="<?phpPHP_SELF?>" method="post" enctype="multipart/form-data" name="poll_form" onSubmit="return form_Validator(this)">
                      <table border="0" cellspacing="1" cellpadding="2" id="uploadtable">
                        <tr> 
                          <td width="166" class="text"><strong>Title</strong></td>
                          <td width="397"><input name="st_name" type="text" class="text_box" id="st_name" size="100"></td>
                        </tr>
                        <tr> 
                          <td width="166" valign="top" class="text"><strong>Description/Text Notes </strong></td>
                          <td width="397"><textarea name="description" cols="100" rows="8" class="text_box" id="description"></textarea> 
                          </td>
                        </tr>
                        <tr> 
                          <td class="text"><strong>File</strong></td>
                          <td><input name="upload" type="file" class="search_box1" size="87"></td>
                        </tr>
                        <tr> 
                          <td valign="top" class="text">&nbsp;</td>
                          <td><input type="submit" name="Submit" value="Submit" class="text_box"></td>
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