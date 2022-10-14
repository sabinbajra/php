<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
?> 
<?
	include ("../../include/db.php");
	$query = "SELECT * FROM teacher WHERE id='$id'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
?>
<title>Upload Photo! <?=$show[firstname];?>... </title>
<script language="JavaScript1.2" src="../include/form_validator.js"></script>
<link href="../include/admin.css" rel="stylesheet" type="text/css">
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form action="upload_enf_teacher.php?id=<?=$id;?>" method="post" enctype="multipart/form-data" name="upload" onSubmit="return form_Validator(this)">
  <?
		if($le == 1)
			{
				if($er == 1)
					$errMsg	=	"<font color='#FF0000'><span class=\"text\">Picture type not supported! Only <strong>.jpg</strong> and <strong>.gif</strong> are allowed!</span></font>";
				elseif($er == 2)
					$errMsg	=	"&nbsp;<font color='#FF0000'><span class=\"text\">Attachment file too big! Upto <strong>50kb</strong> is allowed!</span></font>";
				elseif($er == 3)
					$errMsg	=	"&nbsp;<span class=\"title\">Upload successful! </span><meta http-equiv=\"refresh\" content=\"2; URL=auto_close.html\">";
					//$errMsg	=	"&nbsp;Upload successful!<html><body onload='javascript:window.close()'></body></html>";
	?>
  <?=$errMsg;?>
  <? 
	   		}
	?>
  <table width="342" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
    <tr> 
      <td width="334" bgcolor="#F4F4F4" class="title">:: Upload Photo!</td>
    </tr>
    <tr> 
      <td><input name="attachment" type="file" class="search_box1" id="attachment" size="50"></td>
    </tr>
    <tr> 
      <td class="text1"> <strong>Note</strong> : Make sure 
        that the photo is in correct format viz.</td>
    </tr>
    <tr> 
      <td><img src="../images1/spacer.gif" width="1" height="1"></td>
    </tr>
    <tr> 
      <td height="46" valign="top" class="small"> &nbsp;&nbsp;&raquo; Extension 
        - .jpg / .gif<br>
        &nbsp;&nbsp;&raquo; Dimension - 90 / 113 px<br>
        &nbsp;&nbsp;&raquo; Size - Up to 50 Kb allowed</br></td>
    </tr>
    <tr>
      <td class="small"><input type="submit" name="Submit" value="Submit" class="search_box1">
        <input type="button" name="Submit2" value="close" onclick="javascript:window.close()"  class="search_box1"> </td>
    </tr>
  </table>
  <table width="342" border="0" align="center" cellpadding="3" cellspacing="0" class="table">
    <tr> 
      <td width="334" bgcolor="#F4F4F4" class="small">:: Please Refresh your <strong>Browser</strong> 
        after uploading the photo!</td>
    </tr>
  </table>
</form>