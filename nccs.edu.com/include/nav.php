<?php
	//MainMenu - (About Us)
	if ($pageID == "Background" || $pageID == "Aims_Objectives" || $pageID == "Committee" || $pageID == "Duration_Courses" || $pageID == "Eligibility" || $pageID == "Entrance_Examination" || $pageID == "Fees_Expenses" || $pageID == "Proposed_Courses") {
		include "about_us/" . $pageID . ".php";
	
	}
	
	elseif ($pageID == "About_Us" || $pageID == "Directory" || $pageID == "Research" || $pageID == "Resources" || $pageID == "Application" || $pageID == "Curriculum" || $pageID == "Contact_Us") {
		include $pageID.".php";
	}
		
		//SubMenu - Directory
		elseif ($pageID == "Student_Profile" || $pageID == "Teacher_Profile" || $pageID == "Search" || $pageID == "Result" || $pageID == "Control_Center" || $pageID == "Web_Board") {
			include "directory/" . $pageID.".php";
		}

	//Top Menu
	elseif ($pageID == "Search" || $pageID == "Search_Action" || $pageID == "Feedback" || $pageID == "Feedback_Action" || $pageID == "Sitemap") {
		include $pageID.".php";
	}
	
	else {
		echo "<strong><font color=\"#FF0000\">Error:</font></strong> File not found!";
		//echo "<meta http-equiv=\"refresh\" content=\"1;URL=../index.php\">";
	}
?>