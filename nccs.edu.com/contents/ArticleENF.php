<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	include ("../include/db.php");
	$s_date = date("F j, Y");
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
					//Add News/Articles
					if ($Db == "POST") {
						
						//get post vars
						$headlines	=	trim($_POST['headlines']);
						$headlines	=	addslashes($headlines);
						$contents	=	trim($_POST['contents']);
						$contents	=	addslashes($contents);
						$contents	=	str_replace("\n","<BR>",$contents);
						$submitted_by	=	trim($_POST['PostName']);
						$submitted_by	=	addslashes($submitted_by);
					
						$query = "INSERT INTO tbl_news_articles (headlines, contents, submitted_on, submitted_by, mem_id) VALUES ('$headlines', '$contents', '$s_date', '$submitted_by', '$mem_id')"; 
						$result = mysql_query($query);
							
	                    if ($result) {
							echo "<span class=\"text\">News/Articles: <font color=\"#FF0000\"><strong>".$headlines ."</strong></font> was successfully added!<br>After approve by Administrator, your article can be read by other members or non members.</span>";
						}
						else {
							echo "<span class=\"text\">News/Articles: <font color=\"#FF0000\"><strong>".$headlines."</strong></font> could not added !!! </span>";
						}
					}
					
					// Edit News/Articles
					if ($Db == "EDIT"){
						$headlines	=	trim($_POST['headlines']);
						$headlines	=	addslashes($headlines);
						$contents	=	trim($_POST['contents']);
						$contents	=	addslashes($contents);
						$contents	=	str_replace("\n","<BR>",$contents);
						$submitted_by	=	trim($_POST['PostName']);
						$submitted_by	=	addslashes($submitted_by);
						$query = "UPDATE tbl_news_articles SET headlines='$headlines', contents='$contents', submitted_by='$submitted_by', approved='2' WHERE id = '$id'";
						$result = mysql_query($query);
							if ($result) {
								echo "<div align=\"center\">News/Articles has been <font color=\"#FF0000\"><strong>Edited/Modified</strong></font> Succesfully!<br>After approve by Administrator, your modified article can be read by other members or non members.</div></center>";
							} else {
								echo mysql_error();
							}			
					}
					
					// Delete New/Articles
					if ($Db == "DELETE") {
						$DEL = mysql_query("DELETE FROM tbl_news_articles WHERE id=$_GET[id] AND mem_id=$_GET[mem_id]");
						if ($DEL) {
							echo "<div align=\"center\">News/Articles has been <font color=\"#FF0000\"><strong>Deleted</strong></font> Succesfully!</div></center>";
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
    <td width="486" background="<?=$AdminImages;?>bks/button1_fill.gif"><div align="right"><a href="?MemberPageID=ArticlePosted">List</a>&nbsp;</div></td>
    <td width="7"><img src="<?=$AdminImages;?>bks/button1_right.gif" width="7" height="23"></td>
  </tr>
</table>