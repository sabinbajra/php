<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	include ("../include/db.php");
	$mem_id = $_POST['PostID'];
	$id		= $_POST['id'];
?>
<br>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <tr> 
    <td width="7"><img src="<?=$AdminImages;?>bks/button1_left.gif" width="7" height="23"></td>
    <td width="486" background="<?=$AdminImages;?>bks/button1_fill.gif"><img src="../images/icons/comment.gif" width="16" height="16" align="bottom"> Status:</td>
    <td width="7"><img src="<?=$AdminImages;?>bks/button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
    <td height="131" colspan="3" bgcolor="#FFFFFF">
	  <table width="492" height="131" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
        <tr>
          <td width="1" background="<?=$AdminImages;?>bks/menubox_side_border.gif"><img src="../images/bks/menubox_side_border.gif" width="1" height="28"></td>
          <td width="490">
		  	<center> 
            <?php					
				// Edit News/Articles
				if ($Db == "EDIT"){
					//get post vars
					$name	=	trim($_POST['name']);
					$name	=	addslashes($name);
					$description	=	trim($_POST['description']);
					$description	=	addslashes($description);
					$description	=	str_replace("\n","<BR>",$description);
					$submitted_by	=	trim($_POST['PostName']);
					$submitted_by	=	addslashes($submitted_by);
					$query = "UPDATE tbl_note SET sub_name='$name', sub_desc='$description', sub_sem='$_POST[sem]', submitted_by='$submitted_by', mem_id='$mem_id' WHERE nt_id = '$id'";
					$result = mysql_query($query);
					if ($result) {
						echo "<div align=\"center\">Note has been <font color=\"#FF0000\"><strong>Edited/Modified</strong></font> Succesfully!</div></center>";
					} else {
						echo mysql_error();
					}			
				}
					
				// Delete New/Articles
				if ($Db == "DELETE") {
				
					//Select filename to remove
					$strSql		=	"SELECT sub_file FROM tbl_note WHERE nt_id='$_GET[id]'";
					$dbSql		=	mysql_query($strSql);
					$revfn		=	mysql_fetch_array($dbSql);
					$Att_File	=	mysql_result($dbSql,0,0);
					
					//now remove att. file
					@unlink("../contents/notes/".$Att_File);
					
					$DEL = mysql_query("DELETE FROM tbl_note WHERE nt_id=$_GET[id] AND mem_id=$_GET[mem_id]");
					if ($DEL) {
						echo "<div align=\"center\">Note has been <font color=\"#FF0000\"><strong>Deleted</strong></font><br> Filename: $revfn[sub_file] has been removed Succesfully!</div></center>";
					}
					else {
						echo "<div align=\"center\">Could not delete</div>";
					}
				}
			?>
			</center>
          </td>
          <td width="1" background="<?=$AdminImages;?>bks/menubox_side_border.gif"><img src="../images/bks/menubox_side_border.gif" width="1" height="28"></td>
        </tr>
      </table>
	</td>
  </tr>
  <tr> 
    <td width="7"><img src="<?=$AdminImages;?>bks/button1_left.gif" width="7" height="23"></td>
    <td width="486" background="<?=$AdminImages;?>bks/button1_fill.gif"><div align="right"><a href="?MemberPageID=NotePosted">List</a>&nbsp;</div></td>
    <td width="7"><img src="<?=$AdminImages;?>bks/button1_right.gif" width="7" height="23"></td>
  </tr>
</table>