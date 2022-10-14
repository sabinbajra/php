<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	$PageName = $_REQUEST["PageName"];
	//$Edit = $_POST['Edit'];
	
?>

<input type="hidden" name="PageName" value="<?=$edit;?>">
<br>
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" id="td_content" class="table">
  <tr> 
    
    <td colspan=2 ></td>
    <td width="7">&nbsp;</td>
  </tr>
  <tr > 
    <td height="30" colspan="3" bgcolor="#FFFFFF"><table width="" height="" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
        <tr>
          <td width="1"></td>
          <td width="" bgcolor="#CCCCCC">
		  	<center> 
            <?php
					$TextArea = $_REQUEST["contents"];
					
					// Set the string to be written to the file
					$values = "$TextArea\r\n";
					
					// Open the file for truncated writing
					$fp = fopen("../contents/$PageName.php", "w") or die("Couldn't open $edit.php for writing!");
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
    <td width="7"></td>
    <td width="486">
         <a href="?adminID=viewservice&edit=<?=$PageName;?>">Edit</a> 
        | <a href="?adminID=home">Services</a>&nbsp;| <a href="?adminID=viewservice&view=<?=$PageName;?>">View</a> </div></td>
    <td width="7"></td>
  </tr>

</table>
