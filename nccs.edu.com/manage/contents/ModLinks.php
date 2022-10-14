<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
	include ("../include/db.php");
	$id=$_GET['id'];
	$query = "Select * from tbl_links where id = $id";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
		echo "<br><form action=\"?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&Links=Edit&id=$id\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"id\" value=\"$show[id]\">\n"
			."<table width=\"85%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" align=\"center\">\n"
			."  <tr>\n"
			."	<td class=\"text\">Name</td>\n"
			."	<td class=\"text\"><input type=\"text\" name=\"name\" size=\"100\" value=\"$show[name]\" class=\"search_box1\"></td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."  <tr>\n" 
			."  </tr>\n"
			."  <tr>\n" 
			."	<td class=\"text\">URL</td>\n"
			."	<td class=\"text\"><input type=\"text\" name=\"url\" size=\"25\" value=\"$show[url]\" class=\"search_box1\"></td>\n"
			."  </tr>\n"
			."	<td class=\"text\" valign=\"top\">Description</td>\n"
			."	<td><textarea name=\"description\" cols=\"100\" rows=\"8\"  class=\"search_box1\">". str_replace("<BR>","\n",stripslashes($show[description]))."</textarea></td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."	<td class=\"text\">&nbsp;</td>\n"
			."	<td><input type=\"submit\" name=\"submit\" value=\"Edit\" class=\"search_box1\">";
			if ($EditDB == "DatabaseENF") {
				echo "<input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=Links'\" class=\"search_box1\">";
			}
		echo "</td>\n"
			."  </tr>\n"
			."</table>"
			."</form>"
			."<br>";
?>