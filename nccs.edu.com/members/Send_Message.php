<?
	session_start();
	include("../include/db.php");
	include("../include/cls.misc.php");

	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
	//create object
	$objMisc	=	new clsMisc;
	
	//get post vars
	$To			=	trim($_POST['to']);//to username
	$From		=	$_SESSION['valid_user'];
	$Subject	=	trim($_POST['subject']);
	$Subject	=	addslashes($Subject);
	$Message	=	trim($_POST['message']);
	$Message	=	addslashes($Message);
	$Message	=	str_replace("\n","<BR>",$Message);
	$Message_checked = 0;
	
	//Function: Compose-Form
	function IsComposeForm()
		{
		global $Subject;
		global $Message;
		global $ErrorMsg;
		?> <br>
<form action="?MemberPageID=Send_Message" method="post" enctype="multipart/form-data" name="frm_compose" id="frm_compose">
  <table width="510" border="0" cellspacing="0" cellpadding="3" class="table">
    <tr valign="top"> 
      <td height="24" colspan="3"><?=$ErrorMsg;?>
      </td>
    </tr> 
    <tr> 
      <td width="73" class="text">&nbsp;To</td>
      <td width="267"><input name="to" type="text" class="text_box" id="to" size="48" maxlength="255"> 
      </td>
      <td width="152"><div align="right"><a href="#" onClick="MM_openBrWindow('../messages/members_list.php','MemberList','scrollbars=no,width=629,height=620')" class="small_lk">Show members 
          list?</a>&nbsp;&nbsp;</div></td>
    </tr>
    <tr> 
      <td class="text">&nbsp;Subject</td>
      <td colspan="2"><input name="subject" type="text" class="text_box" id="subject" value="<?=$Subject;?>" size="67" maxlength="255"></td>
    </tr>
    <tr class="EE"> 
      <td valign="top" class="text"><br>
        &nbsp;Message</td>
      <td colspan="2"><p> <br>
          <textarea name="message" cols="67" rows="12" id="message" class="text_box"><? echo str_replace("<BR>","\n",$Message);?></textarea>
        </p>
        <br></td>
    </tr>
    <tr class="EE"> 
      <td class="text">&nbsp;Attachment</td>
      <td colspan="2" class="text"><input name="attachment" type="file" class="text_box" id="attachment" size="42">
        <span class="small">Max size: 100 kb</span></td>
    </tr>
    <tr class="EE"> 
      <td class="text">&nbsp;</td>
      <td colspan="2"><input type="submit" name="Submit" value="Send" class="text_box"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
  <?
		}//end of function	
	
	//check if the $to username is valid or not
	if($objMisc->IsValidUsername($To) == "FALSE")
		{
			$ErrorMsg = "<font color='#FF0000'><span class=\"text\">Please Enter <strong>Valid Member ID</strong>!</span></font>";
			die (IsComposeForm());
		}
	//check username complete
	
	//get current date
	$Curr_Date	=	time();
	
	//check attachment if any
	if($attachment == "" OR empty($attachment))
		{
			$strSql	=	"INSERT INTO tbl_message(to_member,from_member,rec_date,subject,message,msg_checked)
							VALUES('$To','$From','$Curr_Date','$Subject','$Message','$Message_checked')
						";
			$dbSql	=	mysql_query($strSql) or die("Error: 1");
		}
	elseif($attachment != "")
		{
			//check attachment file
			$arrSupportedType	=	array("image/gif","image/pjpeg","image/jpeg");
			$Att_Type			=	$attachment_type;
			//check image type
			if($Att_Type == "image/gif")
				{
					$err = 0;
					$ext = ".gif";
				}
			elseif($Att_Type == "image/pjpeg")
				{
					$err = 0;
					$ext = ".jpg";
				}
			elseif($Att_Type == "image/jpeg")
				{
					$err = 0;
					$ext = ".jpg";
				}
			else
				$err = 1;
			
			if($err == 1)
				{
					//header("Location: compose.php?le=1&er=2");
					$ErrorMsg = "<font color='#FF0000'><span class=\"text\">Picture type not supported! Only <strong>.jpg and .gif</strong> are allowed!</span></font>";
					die (IsComposeForm());
				}
			
			//check file size
			$MaxAllowed		=	100;
			$FileSize	=	round(filesize($attachment)/1024,2);//to kb
			
			if($FileSize > $MaxAllowed)
				{
					//header("Location: compose.php?le=1&er=3");
					$ErrorMsg = "<font color='#FF0000'><span class=\"text\">Attachment file too big! Upto <strong>100 kb</strong> is allowed!</span></font>";
					die (IsComposeForm());

				}
			
			$Att_File	=	time()."$ext";
			
			//now upload file
			 @copy($attachment,"../contents/msg_attach/".$Att_File);
			
			$strSql	=	"INSERT INTO tbl_message(to_member,from_member,rec_date,subject,message,attachment,msg_checked)
							VALUES('$To','$From','$Curr_Date','$Subject','$Message','$Att_File','$Message_checked')
						";
			$dbSql	=	mysql_query($strSql) or die("Error: 2".mysql_error());
		}
	
	//complete
	//redirect
	$query = "SELECT * FROM tbl_message WHERE id = '$id'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
	echo "<center><br><span class=\"text\">Your message has been sent to <font color='#FF0000'><strong>$To</strong></font> Sucessfully!</span><p><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?MemberPageID=Inbox'\" class=\"text_box\"></center>";
?>