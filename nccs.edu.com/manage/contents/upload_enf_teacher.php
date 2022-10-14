<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
		
	include("../../include/db.php");
	
	//get current date
	$Curr_Date	=	time();
	
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
			
			$query = "SELECT firstname, photo from teacher where id=$id";
			$result = mysql_query($query);
			$show = @mysql_fetch_array($result);
						
			$Att_File	=	$show[firstname]."_".time()."$ext";
			
			//now upload file
			
			//$upphoto = mysql_query("SELECT photo from student_profile WHERE id = $id");
			//$view = mysql_fetch_array($upphoto);
			@unlink("../../contents/directory/photos_teacher/$show[photo]");
			@copy($attachment,"../../contents/directory/photos_teacher/".$Att_File);
			
		
			$strSql	=	"UPDATE teacher SET photo = '$Att_File' WHERE id = $id";
			$dbSql	=	mysql_query($strSql) or die("Error: ".mysql_error());

/*
			$photo = mysql_query("SELECT photo from student_profile WHERE id = $valid_id");
			$view = mysql_fetch_array($photo);
			@unlink("../../contents/directory/photos/$view[photo]");
			@copy($attachment,"../../contents/directory/photos/".$Att_File);
			
		
			$strSql	=	"UPDATE student_profile SET photo = '$Att_File' WHERE id = $valid_id";
			$dbSql	=	mysql_query($strSql) or die("Error: 2".mysql_error());

*/			
		}
	
	//complete
	//redirect
	header("Location: upload_photo.php?le=1&er=3");
	//include "upload_photo.php?le=1&er=3";
?>