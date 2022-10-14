<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}

	include ("../include/db.php");
	$id = $_GET['id'];
	$query = "Select * from tbl_events where id = $id";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
		echo "<br><form action=\"?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&Events=Edit&id=$id\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"id\" value=\"$show[id]\">\n"
			."<table width=\"85%\" border=\"0\" cellspacing=\"1\" cellpadding=\"3\" align=\"center\">\n"
			."  <tr>\n" 
			."	<td class=\"text\">Date</td>\n"
			."	<td class=\"text\"><input type=\"text\" name=\"date\" size=\"25\" value=\"$show[date]\" class=\"search_box1\"></td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."	<td class=\"text\" valign=\"top\">Event</td>\n"
			."	<td><textarea name=\"events\" cols=\"100\" rows=\"8\"  class=\"search_box1\">". str_replace("<BR>","\n",stripslashes($show[events]))."</textarea></td>\n"
			."  </tr>\n"
			."  <tr>\n"
			."	<td class=\"text\">&nbsp;</td>\n"
			."	<td><input type=\"submit\" name=\"submit\" value=\"Edit\" class=\"search_box1\">";
			if ($EditDB == "DatabaseENF") {
				echo "<input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=Events'\" class=\"search_box1\">";
			}
		echo "</td>\n"
			."  </tr>\n"
			."</table>"
			."</form>"
			."<br>";
?>