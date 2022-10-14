<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	include ("../include/db.php");
	$s_date = date("F j, Y");
	$ViewDB = $_POST['$ViewDB'];
?>
<br>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <tr> 
    <td width="7"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
    <td width="486" background="images/bks/button1_fill.gif"><img src="../images/icons/comment.gif" width="16" height="16" align="absmiddle">&nbsp;Status: Adding</td>
    <td width="7"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
    <td height="131" colspan="3" bgcolor="#FFFFFF">
	  <table width="492" height="131" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
        <tr>
          <td width="1" background="images/bks/menubox_side_border.gif"><img src="../images/bks/menubox_side_border.gif" width="1" height="28"></td>
          <td width="490">
		  	<center> 
            <?php
					// Add Links
					if ($Db == "AddLinks") {
						$name	=	trim($_POST['name']);
						$name	=	addslashes($name);
						$url	=	trim($_POST['url']);
						$url	=	addslashes($url);
						$url	=	str_replace("\n","<BR>",$url);
						$description	=	trim($_POST['description']);
						$description	=	addslashes($description);
						
						$query = "INSERT INTO tbl_links (name, url, description, submitted_on) VALUES ('$name',  '$url', '$description', '$s_date')"; 
						$result = mysql_query($query);
							
	                    if ($result) {
							echo "<span class=\"text\">Link: <font color=\"#FF0000\"><strong>".$name."</strong></font> was successfully added !!! </span><br>";
						}
						else {
							echo "<span class=\"text\">Link: <font color=\"#FF0000\"><strong>".$name."</strong></font> could not added !!! </span>";
						}
					}

					// Add Events
					if ($Db == "AddEvents") {
						$events	=	trim($_POST['events']);
						$events	=	addslashes($events);
						$events	=	str_replace("\n","<BR>",$events);			
						$query = "INSERT INTO tbl_events (date, events, submitted_on) VALUES ('$_POST[date]', '$events', '$s_date')"; 
						$result = mysql_query($query);
							
	                    if ($result) {
							echo "<span class=\"text\">Event: <font color=\"#FF0000\"><strong>".$events ."</strong></font> of <font color=\"#FF0000\"><strong>" . $date . "</strong></font> was successfully added! </span><br>";
						}
						else {
							echo "<span class=\"text\">Event: <font color=\"#FF0000\"><strong>".$events."</strong></font> could not added! </span>";
						}
					}
				
					//Add News/Articles
					if ($Db == "AddNewsArticles") {
						
						//get post vars
						$headlines	=	trim($_POST['headlines']);
						$headlines	=	addslashes($headlines);
						$contents	=	trim($_POST['contents']);
						$contents	=	addslashes($contents);
						$contents	=	str_replace("\n","<BR>",$contents);
						$submitted_by	=	trim($_POST['submitted_by']);
						$submitted_by	=	addslashes($submitted_by);
					
						$query = "INSERT INTO tbl_news_articles (headlines, contents, submitted_on, submitted_by) VALUES ('$headlines', '$contents', '$s_date', '$submitted_by')"; 
						$result = mysql_query($query);
							
	                    if ($result) {
							echo "<span class=\"text\">News/Articles: <font color=\"#FF0000\"><strong>".$headlines ."</strong></font> of <font color=\"#FF0000\"><strong>" . $submitted_by . "</strong></font> was successfully added! </span><br>";
						}
						else {
							echo "<span class=\"text\">News/Articles: <font color=\"#FF0000\"><strong>".$headlines."</strong></font> could not added! </span>";
						}
					}
					
					//Add Notice
					if ($Db == "AddNotice") {
						
						//get post vars
						$headlines	=	trim($_POST['headlines']);
						$headlines	=	addslashes($headlines);
						$contents	=	trim($_POST['contents']);
						$contents	=	addslashes($contents);
						$contents	=	str_replace("\n","<BR>",$contents);
					
						$query = "INSERT INTO tbl_notice (headlines, contents, submitted_on) VALUES ('$headlines', '$contents', '$s_date')"; 
						$result = mysql_query($query);
							
	                    if ($result) {
							echo "<span class=\"text\">Notice: <font color=\"#FF0000\"><strong>".$headlines ."</strong></font> was successfully added! </span><br>";
						}
						else {
							echo "<span class=\"text\">Notice: <font color=\"#FF0000\"><strong>".$headlines."</strong></font> could not added! </span>";
						}
					}
					
					//Add Courses
					if ($Db == "AddCourses") {
						
						if($_POST['radio']==0){
						$fm=$_POST['fm'];
						$pm=$_POST['pm'];
						$t_fm="";
						$t_pm="";
						$p_fm="";
						$p_pm="";
						}
						else{
						$fm="";
						$pm="";
						$t_fm=$_POST['t_fm'];
						$t_pm=$_POST['t_pm'];
						$p_fm=$_POST['p_fm'];
						$p_pm=$_POST['p_pm'];
						}
						//get post vars
						$cos_name	=	trim($_POST['cos_name']);
						$cos_name	=	addslashes($cos_name);
						$cos_desc	=	trim($_POST['cos_desc']);
						$cos_desc	=	addslashes($cos_desc);
						$cos_desc	=	str_replace("\n","<BR>",$cos_desc);
					
						$query = "INSERT INTO tbl_comp_course (grade,subject,description,fullmark,passmark,th_fullmark,th_passmark,pr_fullmark,pr_passmark,flag) VALUES ('$_POST[sem]','$cos_name', '$cos_desc','$fm','$pm','$t_fm','$t_pm','$p_fm','$p_pm','$_POST[type]')"; 
						$result = mysql_query($query);
							
	                    if ($result) {
							echo "<span class=\"text\">Course: <font color=\"#FF0000\"><strong>".$cos_name ."</strong></font> was successfully added !!! </span><br>";
						}
						else {
							echo "<span class=\"text\">Course: <font color=\"#FF0000\"><strong>".$cos_name."</strong></font> could not added! </span>";
						}
					}
					
					//Add Results
					if ($Db == "AddResults") {
					
					echo "<p align=\"center\">Result for: $_POST[StdName]</p><p align=\"left\">";
							//get post vars
									$class	=	$_POST['class'];
									$stdID	=	$_POST['id'];
									
							
							
												
						$comp1 = $_POST['comp1'];
						$comp2 = $_POST['comp2'];
						$comp3 = $_POST['comp3'];
						
						$comp1_TM = $_POST['comp1TM'];
						$comp2_TM = $_POST['comp2TM'];
						$comp3_TM = $_POST['comp3TM'];
						 
						
						$comp1_PM = $_POST['comp1PM'];
						$comp2_PM = $_POST['comp2PM'];
						$comp3_PM = $_POST['comp3PM'];
						
						$opt1 = $_POST['opt1'];
						$opt2 = $_POST['opt2'];
						$opt3 = $_POST['opt3'];
						
						
						$opt1TM = $_POST['opt1TM'];
						$opt2TM = $_POST['opt2TM'];
						$opt3TM = $_POST['opt3TM'];
						
						
						$opt1PM = $_POST['opt1PM'];
						$opt2PM = $_POST['opt2PM'];
						$opt3PM = $_POST['opt3PM'];
						
						
						//for course id
						
						$c_id1 = $_POST['CosID1'];
						$c_id2 = $_POST['CosID2'];
						$c_id3 = $_POST['CosID3'];
						
						
						
						$o_id1 = $_POST['optCosID1'];
						$o_id2 = $_POST['optCosID2'];
						$o_id3 = $_POST['optCosID3'];
						
						
						if($class == '11')
						{
						
						$cquery1 = "INSERT INTO tbl_result (std_id,comp_cos_id,opt_cos_id,mark,th_mark_obtain,pr_mark_obtaiin,pass_fail) VALUES ('$stdID', '$c_id1', '','$comp1','$comp1_TM','$comp1_PM','')";
						
						$cquery2 = "INSERT INTO tbl_result (std_id,comp_cos_id,opt_cos_id,mark,th_mark_obtain,pr_mark_obtaiin,pass_fail) VALUES ('$stdID', '$c_id2', '','$comp2','$comp2_TM','$comp2_PM','')";
						$cquery3 = "INSERT INTO tbl_result (std_id,comp_cos_id,opt_cos_id,mark,th_mark_obtain,pr_mark_obtaiin,pass_fail) VALUES ('$stdID', '$c_id3', '','$comp3','$comp3_TM','$comp3_PM','')";
	
						$oquery1 = "INSERT INTO tbl_result (std_id,comp_cos_id,opt_cos_id,mark,th_mark_obtain,pr_mark_obtaiin,pass_fail) VALUES ('$stdID', '$o_id1', '','$opt1','$opt1TM','$opt1PM','')";					
						
						$oquery2 = "INSERT INTO tbl_result (std_id,comp_cos_id,opt_cos_id,mark,th_mark_obtain,pr_mark_obtaiin,pass_fail) VALUES ('$stdID', '$o_id2', '','$opt2','$opt2TM','$opt2PM','')";					
						
						
							
						$result1 = mysql_query($cquery1);
						$result2 = mysql_query($cquery2);
						$result3 = mysql_query($cquery3);
						$result4 = mysql_query($oquery1);
						$result5 = mysql_query($oquery2);
						
						}
						
						
						
						
						if($class == '12')
						{
						
						$cquery1 = "INSERT INTO tbl_result (std_id,comp_cos_id,opt_cos_id,mark,th_mark_obtain,pr_mark_obtaiin,pass_fail) VALUES ('$stdID', '$c_id1', '','$comp1','$comp1_TM','$comp1_PM','')";
						
						$cquery2 = "INSERT INTO tbl_result (std_id,comp_cos_id,opt_cos_id,mark,th_mark_obtain,pr_mark_obtaiin,pass_fail) VALUES ('$stdID', '$c_id2', '','$comp2','$comp2_TM','$comp2_PM','')";
						$oquery1 = "INSERT INTO tbl_result (std_id,comp_cos_id,opt_cos_id,mark,th_mark_obtain,pr_mark_obtaiin,pass_fail) VALUES ('$stdID', '$o_id1', '','$opt1','$opt1TM','$opt1PM','')";					
						
						$oquery2 = "INSERT INTO tbl_result (std_id,comp_cos_id,opt_cos_id,mark,th_mark_obtain,pr_mark_obtaiin,pass_fail) VALUES ('$stdID', '$o_id2', '','$opt2','$opt2TM','$opt2PM','')";					
						
						$oquery3 = "INSERT INTO tbl_result (std_id,comp_cos_id,opt_cos_id,mark,th_mark_obtain,pr_mark_obtaiin,pass_fail) VALUES ('$stdID', '$o_id3', '','$opt3','$opt3TM','$opt3PM','')";					
						
						
							
						$result1 = mysql_query($cquery1);
						$result2 = mysql_query($cquery2);
						$result3 = mysql_query($oquery1);
						$result4 = mysql_query($oquery2);
						$result5 = mysql_query($oquery3);
						
						echo mysql_error();
						}
						
						
						if($result1 && $result2 && $result3 && $result4 && $result5)
						{
						echo "<span class=\"text\" align=\"center\"><font color=\"#FF0000\"><strong>Result</strong></font> was successfully added! </span><br>";
						}
						
						else
						{
						echo "<span class=\"text\"><font color=\"#FF0000\"><strong>Result</strong></font> could not add! </span><br>";
						}
						
						
						
						
						/*
						
						if(isset($_POST['count'])) {
							$count = $_POST['count'];
							echo "<p align=\"left\">Result for: $_POST[StdName]</p><p align=\"left\">";
							for($i = 1; $i < $count + 1; $i++){
								if(isset($_POST["grade".$i])) {
								
									//get post vars
									$grade	=	$_POST["grade".$i];
									$stdID	=	$_POST['id'];
									$CosID	=	$_POST['CosID'.$i];
									
									$query = "INSERT INTO tbl_result (grade, std_id, cos_id) VALUES ('$grade', '$stdID', '$CosID')"; 
									$result = mysql_query($query);
									if($grade=="")continue;
									if ($result) {
										echo "<span class=\"text\">".$_POST['CrsCod'.$i]." ".$_POST['CrsName'.$i]."  <font color=\"#FF0000\"><strong>$grade</strong></font> was successfully added! </span><br>";
									}
									else {
										echo "<span class=\"text\">".$_POST['CrsCod'.$i]." ".$_POST['CrsName'.$i]."  <font color=\"#FF0000\"><strong>$grade</strong></font> could not add! </span><br>";
									}
								}
								else {
									echo "<span class=\"text\"><font color=\"#FF0000\"><strong>Error:</strong></font> Could not</span>";
								}
							} // end of for
							echo "</p>";
						}*/ // end of if isset count.
					}	
				?>
			</center>
          </td>
          <td width="1" background="images/bks/menubox_side_border.gif"><img src="../images/bks/menubox_side_border.gif" width="1" height="28"></td>
        </tr>
      </table>
	</td>
  </tr>
  <tr> 
    <td width="7"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
    <td width="486" background="images/bks/button1_fill.gif"><div align="right"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=<?=$Db;?>">Add</a> 
        | <a href="?AdminPageID=Contents">Contents</a>&nbsp;</div></td>
    <td width="7"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
  </tr>
</table>