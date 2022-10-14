<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
		
	include("../include/db.php");
	
	//get current date
	$Curr_Date	=	time();
	
	if ($MyPhoto == "Delete") {
	
			$query = "SELECT firstname, photo from tbl_members where id = " . $_SESSION["valid_id"];
			$result = mysql_query($query);
			$show = @mysql_fetch_array($result);
			
			@unlink("../members/mem_photos/$show[photo]");
			//@copy($attachment,"../members/mem_photos/".$Att_File);
			
			$DelPic =	"";
			$strSql	=	"UPDATE tbl_members SET photo = '$DelPic' WHERE id = " . $_SESSION["valid_id"];
			$dbSql	=	mysql_query($strSql) or die("Error: ".mysql_error());
			
			echo "<br><table width=\"80%\" cellpadding=\"2\" cellspacing=\"0\" border=\"0\" class=\"text\" align=\"center\">
				<tr>
				  <td>Your photo has been <font color=\"#FF0000\"><strong>Deleted</strong></font> from Database Successfully!<p align=\"center\"><input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?MemberPageID=Option&Opt=My_Profile'\" class=\"search_box1\"></p></td>
				</tr>
			  </table>";		
	}
	
	if ($MyPhoto == "upLoad") {
	//check attachment if any
		if($attachment != "")
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
					
					header("Location: upload_photo.php?le=1&er=1");
					die();
				}
			
			//check file size
			$MaxAllowed		=	50;
			$FileSize	=	round(filesize($attachment)/1024,2);//to kb
			
			if($FileSize > $MaxAllowed)
				{
					header("Location: upload_photo.php?le=1&er=2");
					die();

				}
			
			$query = "SELECT firstname, photo from tbl_members where id = " . $_SESSION["valid_id"];
			$result = mysql_query($query);
			$show = @mysql_fetch_array($result);
						
			$Att_File	=	$show[firstname]."_".time()."$ext";
			
			//now upload file
			
			@unlink("../members/mem_photos/$show[photo]");
			@copy($attachment,"../members/mem_photos/".$Att_File);
			
		
			$strSql	=	"UPDATE tbl_members SET photo = '$Att_File' WHERE id = " . $_SESSION["valid_id"];
			$dbSql	=	mysql_query($strSql) or die("Error: ".mysql_error());

		}
	
	//complete
	//redirect
	header("Location: upload_photo.php?le=1&er=3");
	//include "upload_photo.php?le=1&er=3";
	}
?>