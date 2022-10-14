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
    
  </tr>
  <tr>
    <td><hr size="1" color="#EEEFF9">
      <?php
	  
			if ( $Opt == "Change_Pwd" || $Opt == "Change_Pwd_Enf" || $Opt == "Change_Validity"  || $Opt == "Change_Validity_Enf") {
			
				include $Opt . ".php";
			}
		?>
    </td>
  </tr>
</table>