<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
?> <br>
<form action="?MemberPageID=Send_Message" method="post" enctype="multipart/form-data" name="frm_compose" id="frm_compose">
  <table width="510" border="0" cellspacing="0" cellpadding="3" class="table">
    <tr valign="top"> 
      <td height="24" colspan="3">
	  
  <?
		if($le == 1)
			{
				if($er == 1)
					$errMsg	=	"<font color='#FF0000'><span class=\"text\">That was not a <strong>Valid Member ID</strong>  Please Enter <strong>Valid Member ID</strong>! Or you can have the Member's List by click on the 'Show members list?' </span></font>";
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
	  
      </td>
    </tr> 
    <tr> 
      <td width="73" class="text">&nbsp;To</td>
      <td width="267"><input name="to" type="text" id="to" size="48" maxlength="255" class="text_box"> 
      </td>
      <td width="152"><div align="right"><a href="#" onClick="MM_openBrWindow('members_list.php','MemberList','scrollbars=no,width=629,height=620')" class="small_lk">Show members 
          list?</a>&nbsp;&nbsp;</div></td>
    </tr>
    <tr> 
      <td class="text">&nbsp;Subject</td>
      <td colspan="2"><input name="subject" type="text" class="text_box" id="subject" size="67" maxlength="255"></td>
    </tr>
    <tr class="EE"> 
      <td valign="top" class="text"><br>
        &nbsp;Message</td>
      <td colspan="2"><p> <br>
          <textarea name="message" cols="67" rows="12" id="message" class="text_box"></textarea>
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