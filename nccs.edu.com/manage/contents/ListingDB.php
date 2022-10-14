<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
?> 
		  
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<br>
<table width="770" border="0" cellspacing="0" cellpadding="0" class="text">
  <tr> 
	<td width="1"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
	<td width="500" background="images/bks/button1_fill.gif"><strong><img src="../images/icons/dir.gif" width="16" height="13" align="absmiddle"> 
      <? 
	  if ($ViewDB) {
	  	// Titles: While Listing Data From Database...
	  	if ($ViewDB=="NewsArticles") {
	  		echo "Listing: News/Articles";		
		}
		else if ($ViewDB=="Notice") {
			echo "Listing: Notice";
		}
		else if ($ViewDB=="Notes") {
			echo "Listing: Notes";
		}
	  	else if ($ViewDB=="Events") {
	  		echo "Listing: Events";		
		}
	  	else if ($ViewDB=="Links") {
	  		echo "Listing: Links";		
		}
		else if ($ViewDB=="Courses") {
	  		echo "Listing: Courses";		
		}
		else if ($ViewDB=="Results") {
	  		echo "Listing: Results";		
		}
	  	else {
			echo "Error";
		}
	  }
	  else if ($AddDB) {
	  	// Titles: While Adding Data to Database...
	  	if ($AddDB=="AddNewsArticles") {
	  		echo "Add: News/Articles";		
		}
		else if ($AddDB=="AddNotice") {
			echo "Add: Notice";
		}
		else if ($AddDB=="AddNotes") {
			echo "Add: Notes";
		}
	  	else if ($AddDB=="AddEvents") {
	  		echo "Add: Events";		
		}
		else if ($AddDB=="AddLinks") {
	  		echo "Add: Links";		
		}
		else if ($AddDB=="AddCourses") {
	  		echo "Add: Courses";		
		}
		else if ($AddDB=="AddResults") {
	  		echo "Add: Results";		
		}
		else {
			echo "Error";
		}
	  }
	  else {
	  	// Titles: While Editing Data to Database...
	  	if ($EditDB=="ModNewsArticles") {
	  		echo "Edit: News/Articles";		
		}
		else if ($EditDB=="ModNotice") {
			echo "Edit: Notice";
		}
		else if ($EditDB=="ModNotes") {
			echo "Edit: Note";
		}
	  	else if ($EditDB=="ModEvents") {
	  		echo "Edit: Events";		
		}
	  	else if ($EditDB=="ModLinks") {
	  		echo "Edit: Links";		
		}
		else if ($EditDB=="ModCourses") {
	  		echo "Edit: Courses";		
		}
		else if ($EditDB=="ModResults") {
	  		echo "Edit: Results";		
		}
	  	else if ($EditDB=="DatabaseENF") {
	  		echo "Edit...";		
		}
		else {
			echo "Error";
		}
	}
	  ?></strong>	</td>
	<td width="268" background="images/bks/button1_fill.gif" align="right">
	<?
		if (!$ViewDB) {
			echo "";
		}
		else {
			echo "<input type=\"button\" name=\"Submit\" value=\"Add\" onClick=\"window.location='?AdminPageID=Contents&List=ListingDB&AddDB=Add" . $ViewDB . "'\" class=\"search_box1\">";
		}
	?>
	
				<input type="button" name="Submit" value="Back" onClick="javascript: history.back()" class="search_box1">&nbsp;</td>
	<td width="1"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
	<td height="250" colspan="4" bgcolor="#FFFFFF" class="text"> 
      <table width="755" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
		<tr>
		  <td width="1" background="images/bks/menubox_side_border.gif"><img src="../images/bks/menubox_side_border.gif" width="1" height="28"></td>
		  <td width="753" height="250" valign="top"> 
            <?
				if ($ViewDB == "NewsArticles" || $ViewDB == "Notice" || $ViewDB == "Notes" || $ViewDB == "Events" || $ViewDB == "Links" || $ViewDB == "Courses" || $ViewDB == "Results") {
					include $ViewDB . ".php";
				}
				else if ($AddDB == "AddNewsArticles" || $AddDB == "AddNotice" || $AddDB == "AddNotes" || $AddDB == "AddEvents" || $AddDB == "AddLinks" || $AddDB == "AddCourses" || $AddDB == "AddResults") {
					include $AddDB . ".php";
				}
				else if ($EditDB == "ModNewsArticles" || $EditDB == "ModNotice" || $EditDB == "ModNotes" || $EditDB == "ModEvents" || $EditDB == "ModLinks" || $EditDB == "ModCourses" || $EditDB == "ModResults" || $EditDB == "DatabaseENF") {
					include $EditDB . ".php";				
				}
				else {
					if ($ViewDB) {
						echo "&nbsp;<strong>Database</strong> not found...";
					}
					else {
						echo "&nbsp;<strong>File</strong> does not exist";
					}		
				}
			?>
          </td>
		  <td width="1" background="images/bks/menubox_side_border.gif"><img src="../images/bks/menubox_side_border.gif" width="1" height="28"></td>
		</tr>
	  </table>
	  
    </td>
  </tr>
  <tr> 
	<td width="1"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
	<td width="500" background="images/bks/button1_fill.gif">&nbsp;</td>
	<td width="268" background="images/bks/button1_fill.gif" align="right"> 
	<?
		if (!$ViewDB) {
			echo "";
		}
		else {
			echo "<input type=\"button\" name=\"Submit\" value=\"Add\" onClick=\"window.location='?AdminPageID=Contents&List=ListingDB&AddDB=Add" . $ViewDB . "'\" class=\"search_box1\">";
		}
	?>
				<input type="button" name="Submit" value="Back" onClick="javascript: history.back()" class="search_box1">&nbsp;</td>
	<td width="1"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
  </tr>
</table>