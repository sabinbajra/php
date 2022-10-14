<?php
	include ("include/db.php");
	$find_log_tot = "SELECT * FROM tbl_members WHERE login_yn='1' order by username";
	$log_result = mysql_query($find_log_tot);
	$log_tot = mysql_num_rows($log_result);
	
	if ($log_tot == 0) {
		echo "<span class=\"login_sm_text\">No member logged in in this time!</span>";
	}
	echo " 
		<table width=\"112\" border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"#A7A1C7\" class=\"small\">";
		while ($show = mysql_fetch_array($log_result)) {
		echo "
		  <tr bgcolor=\"#D8D6E7\">
			<td width=\"14%\">&nbsp;<img src=\"".$Images."icons/mem_bullet.gif\" width=\"7\" height=\"7\"></td>
			<td width=\"86%\"> 
			  <a href=\"?MemberPageID=View_Profile&id=$show[id]\" class=\"small_lk\">$show[username]</a>
			</td>
		  </tr>";
		}
	echo"</table>";
?>