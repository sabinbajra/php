<?php
	//Page Titles - Display on each page...
	if ($MemberPageID == "Inbox") {
		echo ":: Inbox ::";
	}
	else if ($MemberPageID == "ViewMsg") {
		echo ":: Message - Inbox ::";
	}	
	else if ($MemberPageID == "Compose") {
		echo ":: Compose - Inbox ::";
	}
	else if ($MemberPageID == "Send_Message") {
		echo ":: Send Message ::";
	}
	else if ($MemberPageID == "Remove_Message") {
		echo ":: Remove Message(s) ::";
	}
	else if ($MemberPageID == "Reply") {
		echo ":: Reply Message ::";
	}
	else if ($MemberPageID == "Option") {
		echo ":: Option ::";
	}
	else if ($MemberPageID == "View_Profile") {
		echo ":: View Profile ::";
	}
	else if ($MemberPageID == "upLoad_ENF") {
		echo ":: Delete Confirmation... ::";
	}
	else if ($MemberPageID == "Introduction_BIM") {
		echo ":: Introduction of BIM ::";
	}
	else if ($MemberPageID == "Introduction_NCCS") {
		echo ":: Introduction of NCCS ::";
	}
	else if ($MemberPageID == "Aims_Objectives") {
		echo ":: Aims & Objectives ::";
	}
	else if ($MemberPageID == "Students_Profile") {
		echo ":: Students's Profile ::";
	}
	else if ($MemberPageID == "Staffs_Profile") {
		echo ":: Staff's Profile ::";
	}
	else if ($MemberPageID == "SiteTeam") {
		echo ":: SiteTeam ::";
	}
	else if ($MemberPageID == "Search") {
		echo ":: Search ::";
	}
	else if ($MemberPageID == "Search_ENF") {
		echo ":: Search ::";
	}
	else if ($MemberPageID == "Articles" || $MemberPageID == "ArticleENF") {
		echo ":: News/Articles ::";
	}
	else if ($MemberPageID == "ArticlePOST") {
		echo ":: Post News/Articles ::";
	}
	else if ($MemberPageID == "ArticlePosted") {
		echo ":: List News/Articles ::";
	}
	else if ($MemberPageID == "ArticleModify") {
		echo ":: Modify News/Articles ::";
	}
	else if ($MemberPageID == "NoteENF") {
		echo ":: Note ::";
	}
	else if ($MemberPageID == "NotePOST") {
		echo ":: Post Note ::";
	}
	else if ($MemberPageID == "NotePosted") {
		echo ":: List Note ::";
	}
	else if ($MemberPageID == "NoteModify") {
		echo ":: Modify Note ::";
	}
	else if ($MemberPageID == "Downloads") {
		echo ":: Downloads & Links ::";
	}
	else if ($MemberPageID == "BookAdd") {
		echo ":: Add Book ::";
	}
	else if ($MemberPageID == "Book_ENF") {
		echo ":: Books ::";
	}
	else if ($MemberPageID == "BookList") {
		echo ":: List Books ::";
	}
	else if ($MemberPageID == "BookModify") {
		echo ":: Modify Book ::";
	}
	else if ($MemberPageID == "BookIssue") {
		echo ":: Issue Book ::";
	}
	else if ($MemberPageID == "BookReceipt") {
		echo ":: Receipt Book ::";
	}
	else if ($MemberPageID == "Contact_Us") {
		echo ":: Contact Us ::";
	}
	else {
		echo "Welcome «CMS.NCCS.com»";
	}	
?>