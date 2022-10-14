<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
?> 

<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
     <td height="23" valign="top" class="text">
	   <div align="right"><img src="../images/icons/file.gif" width="14" height="16" align="absmiddle">&nbsp;<a href="member.php?MemberPageID=Option&Opt=My_Profile">View 
        Profile</a> |&nbsp;<img src="../images/icons/comment.gif" width="16" height="16" align="absmiddle">&nbsp; 
        <a href="member.php?MemberPageID=Option&Opt=Modify_My_Profile">Modify 
        Profile</a> |&nbsp;<img src="../images/icons/c_pwd1.gif" width="17" height="16" align="absmiddle"> 
        <a href="member.php?MemberPageID=Option&Opt=Change_Pwd">Change Password</a> 
      </div>
	 </td>
  </tr>
  <tr>
    <td><hr size="1" color="#EEEFF9">
      <?php
			if ($Opt == "My_Profile" || $Opt == "Modify_My_Profile" || $Opt == "modify_enf" || $Opt == "Change_Pwd" || $Opt == "ENF") {
				include $Opt . ".php";
			}
		?>
    </td>
  </tr>
</table>