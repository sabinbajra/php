<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: index.php");
		}
	
?> 

<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    
  </tr>
  <tr>
    <td>      <?php
	  
			if ( $Opt == "New" ) {
			
				include $Opt . "exp.php";
			}
			if($Opt == "NewexpenseHead_Enf" )
			{
			include $Opt.".php";
			}
		?>
    </td>
  </tr>
</table>