<?php
	//Page Titles - Display on each page...
	if ($PageID == "Introduction_BIM") {
		echo "&nbsp;<img src=\"images/icons/_info.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Introduction of BIM</span>";
	}
	else if ($PageID == "Introduction_NCCS") {
		echo "&nbsp;<img src=\"images/icons/_info.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Introduction of NCCS</span>";
	}
	else if ($PageID == "Aims_Objectives") {
		echo "&nbsp;<img src=\"images/icons/tgz.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Aims & Objectives</span>";
	}
	else if ($PageID == "Students_Profile") {
		echo "&nbsp;<img src=\"images/icons/members.gif\" width=\"18\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Student's Profile</span>";
	}
	else if ($PageID == "Teachers_Profile") {
		echo "&nbsp;<img src=\"images/icons/members.gif\" width=\"18\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Teacher's Profile</span>";
	}
	else if ($PageID == "SiteTeam") {
		echo "&nbsp;<img src=\"images/icons/team.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">SiteTeam</span>";
	}
	else if ($PageID == "Search") {
		echo "&nbsp;<img src=\"images/icons/search.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Search</span>";
	}
	else if ($PageID == "Articles") {
		echo "&nbsp;<img src=\"images/icons/src.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">News/Articles</span>";
	}
	else if ($PageID == "Downloads") {
		echo "&nbsp;<img src=\"images/icons/download.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Downloads & Links</span>";
	}
	else if ($PageID == "Add Book") {
		echo "&nbsp;<img src=\"images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Add Book</span>";
	}
	else if ($PageID == "Book_ENF") {
		echo "&nbsp;<img src=\"images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Book</span>";
	}
	else if ($PageID == "Contact_Us") {
		echo "&nbsp;<img src=\"images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Contact Us</span>";
	}
	else if ($PageID == "ForgotPWD") {
		echo "&nbsp;<img src=\"images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Forgot Password</span>";
	}
	else {
		echo "&nbsp;<span class=\"title\">Welcome</span>";
	}
	
?>