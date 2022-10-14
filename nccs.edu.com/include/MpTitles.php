<?php
	//Page Titles - Display on each page...
	if ($MemberPageID == "Inbox") {
		echo "&nbsp;<img src=\"../images/icons/folder.inbox.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Inbox</span>";
	}
	else if ($MemberPageID == "ViewMsg") {
		echo "&nbsp;<img src=\"../images/icons/folder.inbox.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Message...</span>";
	}	
	else if ($MemberPageID == "Compose") {
		echo "&nbsp;<img src=\"../images/icons/compose.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Compose</span>";
	}
	else if ($MemberPageID == "Send_Message") {
		echo "&nbsp;<img src=\"../images/icons/compose.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Compose</span>";
	}
	else if ($MemberPageID == "Remove_Message") {
		echo "&nbsp;<img src=\"../images/icons/delete.gif\" width=\"11\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Delete...</span>";
	}
	else if ($MemberPageID == "Reply") {
		echo "&nbsp;<img src=\"../images/icons/compose.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Reply</span>";
	}
	else if ($MemberPageID == "Option") {
		echo "&nbsp;<img src=\"../images/icons/opt.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Options</span>";
	}
	else if ($MemberPageID == "View_Profile") {
		echo "&nbsp;<img src=\"../images/icons/profile.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">View Profile: &lt;<strong>$show[firstname] $show[middlename] $show[lastname]</strong>&gt;</span>";
	}
	else if ($MemberPageID == "upLoad_ENF") {
		echo "&nbsp;<img src=\"../images/icons/delete.gif\" width=\"11\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Delete Confirmation...</span>";
	}
	else if ($MemberPageID == "Introduction_BIM") {
		echo "&nbsp;<img src=\"../images/icons/_info.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Introduction of BIM</span>";
	}
	else if ($MemberPageID == "Introduction_NCCS") {
		echo "&nbsp;<img src=\"../images/icons/_info.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Introduction of NCCS</span>";
	}
	else if ($MemberPageID == "Aims_Objectives") {
		echo "&nbsp;<img src=\"../images/icons/tgz.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Aims & Objectives</span>";
	}
	else if ($MemberPageID == "Students_Profile") {
		echo "&nbsp;<img src=\"../images/icons/members.gif\" width=\"18\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Student's Profile</span>";
	}
	else if ($MemberPageID == "Staffs_Profile") {
		echo "&nbsp;<img src=\"../images/icons/members.gif\" width=\"18\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Staff's Profile</span>";
	}
	else if ($MemberPageID == "SiteTeam") {
		echo "&nbsp;<img src=\"../images/icons/team.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">SiteTeam</span>";
	}
	else if ($MemberPageID == "Search") {
		echo "&nbsp;<img src=\"../images/icons/search.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Search</span>";
	}
	else if ($MemberPageID == "Search_ENF") {
		echo "&nbsp;<img src=\"../images/icons/search.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Search</span>";
	}
	else if ($MemberPageID == "Articles") {
		echo "&nbsp;<img src=\"../images/icons/src.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">News/Articles</span>";
	}
	else if ($MemberPageID == "ArticlePOST") {
		echo "&nbsp;<img src=\"../images/icons/src.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Post News/Articles</span>";
	}
	else if ($MemberPageID == "ArticlePosted") {
		echo "&nbsp;<img src=\"../images/icons/src.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">List News/Articles</span>";
	}
	else if ($MemberPageID == "ArticleModify") {
		echo "&nbsp;<img src=\"../images/icons/src.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Modify News/Articles</span>";
	}
	else if ($MemberPageID == "ArticleENF") {
		echo "&nbsp;<img src=\"../images/icons/src.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">News/Articles</span>";
	}
	else if ($MemberPageID == "NotePOST") {
		echo "&nbsp;<img src=\"../images/icons/src.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Post Note</span>";
	}
	else if ($MemberPageID == "NotePosted") {
		echo "&nbsp;<img src=\"../images/icons/src.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">List Note</span>";
	}
	else if ($MemberPageID == "NoteModify") {
		echo "&nbsp;<img src=\"../images/icons/src.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Modify Note</span>";
	}
	else if ($MemberPageID == "NoteENF") {
		echo "&nbsp;<img src=\"../images/icons/src.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Note</span>";
	}
	else if ($MemberPageID == "Downloads") {
		echo "&nbsp;<img src=\"../images/icons/download.gif\" width=\"16\" height=\"16\" align=\"absmiddle\">&nbsp;<span class=\"title\">Downloads & Links</span>";
	}
	else if ($MemberPageID == "BookAdd") {
		echo "&nbsp;<img src=\"../images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Add Book</span>";
	}
	else if ($MemberPageID == "Book_ENF") {
		echo "&nbsp;<img src=\"../images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Book</span>";
	}
	else if ($MemberPageID == "BookList") {
		echo "&nbsp;<img src=\"../images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">List Book</span>";
	}
	else if ($MemberPageID == "BookModify") {
		echo "&nbsp;<img src=\"../images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Modify Book</span>";
	}
	else if ($MemberPageID == "BookIssue") {
		echo "&nbsp;<img src=\"../images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Issue Book</span>";
	}
	else if ($MemberPageID == "BookReceipt") {
		echo "&nbsp;<img src=\"../images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Receipt Book</span>";
	}
	else if ($MemberPageID == "Contact_Us") {
		echo "&nbsp;<img src=\"../images/icons/modify.gif\" width=\"15\" height=\"12\" align=\"absmiddle\">&nbsp;<span class=\"title\">Contact Us</span>";
	}
	else {
		echo "Welcome «CMS.NCCS.com»";
	}
	
?>