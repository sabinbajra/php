
<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: index.php");
		}
	
	// =========================== T0 Change The PWD ===========================//
	include ("include/db.php");
	

	if ($Action == "NEW") {
	
	if ($_POST['heading']=="" || $_POST['description']=="" )
			{
				echo "
			<br><table width=\"510\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" class=\"table\" align=\"center\">
			  <tr> 
				  <td class=\"text\"><strong><font color=\"#FF0000\">Please add the heading and description ! Thank YOU !!</font></strong>Try again!</strong></td>
			  </tr>";
			  ?>
			   
			  <?php
			echo "</table>";				  
				include "NewInc.php";
			}
	else
	{
					$query = "Insert into tbl_incomehead (heading,description) values ('$_POST[heading]', '$_POST[description]')";
						
				$result = mysql_query($query);
				
				
				echo "<center><table width=\"60%\"  border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#F4F4F4\" class=\"table\" align=\"center\">
						   <tr bgcolor=\"#FFFFFF\">
							<td  class=\"text\"><img src=\"images/icons/c_pwd.gif\" width=\"23\" height=\"22\"> Confirmation:<hr size =\"1\" color=\"#c1cdd8\"><div align=\"center\">Your New Heading has been added successfully...
							</div></td>
						  </tr>";
						  ?>
						  <tr>
					<td><input type="button" name="Submit" value="Ok" onClick="window.location='?AdminPageID=main'" class="search_box1">&nbsp;</td>
				  </tr>
<?php 						  
						echo "</table></center>";
			}
			
		
		}
	// =========================== End of Heading ===========================//

?>