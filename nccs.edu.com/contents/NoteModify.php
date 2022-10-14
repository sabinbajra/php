<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	include "../include/db.php";
	
	// Get value on Fields
	$GET_Val = mysql_query("SELECT * FROM tbl_note WHERE nt_id='$_GET[id]'");
	$Val_Arr = mysql_fetch_array($GET_Val);
	
	// Get Full Name
	$GET_NAME = mysql_query("SELECT firstname, middlename, lastname from tbl_members WHERE id=$_SESSION[valid_id]");
	$GET_ARRAY = mysql_fetch_array($GET_NAME);
	if (empty($GET_ARRAY["middlename"])) {
		$PostName = $GET_ARRAY["firstname"] . " " . $GET_ARRAY["lastname"];
	}
	else {
		$PostName = $GET_ARRAY["firstname"] . " " . $GET_ARRAY["middlename"] . " " . $GET_ARRAY["lastname"];
	}
?>
<br>
<center>
  <form name="note_form" method="post" action="?MemberPageID=NoteENF&Db=EDIT">
    <input type="hidden" name="id" value="<?=$Val_Arr['nt_id'];?>"/>
	<input type="hidden" name="PostName" value="<?=$PostName;?>"/>
	<input type="hidden" name="PostID" value="<?=$_SESSION["valid_id"];?>"/>
	<table width="494" border="0" align="center" cellpadding="2" cellspacing="1" id="uploadtable">
      <tr>
        <td width="77" class="text">&nbsp;</td>
        <td width="343" class="text"><div align="right"><strong>For Semester</strong></div></td>
        <td width="58"><div align="right">
            <select name="sem" id="select" class="text_box">
              <option value="<?=$Val_Arr['sub_sem'];?>" selected><?=$Val_Arr['sub_sem'];?></option>
			  <option>---</option>
              <option>1st</option>
              <option>2nd</option>
              <option>3rd</option>
              <option>4th</option>
              <option>5th</option>
              <option>6th</option>
              <option>7th</option>
              <option>8th</option>
            </select>
        </div></td>
      </tr>
      <tr>
        <td width="77" class="text"><strong>Sub Name</strong></td>
        <td colspan="2"><input name="name" type="text" class="text_box" value="<?=$Val_Arr['sub_name'];?>" id="name" size="65" /></td>
      </tr>
      <tr>
        <td width="77" valign="top" class="text"><strong>Description</strong></td>
        <td colspan="2"><strong>
          <textarea name="description" cols="64" rows="6" class="text_box" id="description"><?=$Val_Arr['sub_desc'];?>
    </textarea>
        </strong></td>
      </tr>
      <tr>
        <td class="text">&nbsp;</td>
        <td colspan="2"><input type="submit" name="Submit" value="Submit" class="text_box" /></td>
      </tr>
    </table>
  </form>
</center>