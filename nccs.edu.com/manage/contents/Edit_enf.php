<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	$PageName = $_POST['PageName'];
	//$Edit = $_POST['Edit'];
	
?>
<input type="hidden" name="PageName" value="<?=$Edit;?>">
<br>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <tr> 
    <td width="7"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
    <td width="486" background="images/bks/button1_fill.gif"><img src="../images/icons/comment.gif" width="16" height="16" align="absmiddle"> cms.nccs.com/contents/<?=$PageName;?>.php</td>
    <td width="7"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
    <td height="131" colspan="3" bgcolor="#FFFFFF"><table width="492" height="131" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
        <tr>
          <td width="1" background="images/bks/menubox_side_border.gif"><img src="../images/bks/menubox_side_border.gif" width="1" height="28"></td>
          <td width="490">
		  	<center> 
            <?php
					$TextArea = $_POST["contents"];
					
					// Set the string to be written to the file
					$values = "$TextArea\r\n";
					
					// Open the file for truncated writing
					$fp = fopen("../contents/$PageName.php", "w") or die("Couldn't open $Edit.php for writing!");
					$numBytes = fwrite($fp, stripslashes($values)) or die("Couldn't write values to file!");
					//fclose($fp);
					echo "Wrote $numBytes bytes to <strong>$PageName.php</strong> successfully!";
				
				?>
			</center>
          </td>
          <td width="1" background="images/bks/menubox_side_border.gif"><img src="../images/bks/menubox_side_border.gif" width="1" height="28"></td>
        </tr>
      </table> </td>
  </tr>
  <tr> 
    <td width="7"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
    <td width="486" background="images/bks/button1_fill.gif"><div align="right"><a href="?AdminPageID=Contents&View=<?=$PageName;?>">View</a> 
        | <a href="?AdminPageID=Contents&Edit=<?=$PageName;?>">Edit</a> 
        | <a href="?AdminPageID=Contents">Contents</a>&nbsp;</div></td>
    <td width="7"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
  </tr>

</table>
