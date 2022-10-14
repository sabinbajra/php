<?php
	include ("../include/db.php");
	$id = $_GET['id'];

//================================ For News/Articles Section ================================
	//Edit News/Articles
	if ($NewsArticles == "Edit"){
		$headlines	=	trim($_POST['headlines']);
		$headlines	=	addslashes($headlines);
		$contents	=	trim($_POST['contents']);
		$contents	=	addslashes($contents);
		$contents	=	str_replace("\n","<BR>",$contents);
		$submitted_by	=	trim($_POST['submitted_by']);
		$submitted_by	=	addslashes($submitted_by);
		$query = "UPDATE tbl_news_articles SET headlines='$headlines', contents='$contents', submitted_by='$submitted_by' WHERE id = '$id'";
		$result = mysql_query($query);
			if ($result) {
				echo "<br><div align=\"center\">News/Articles has been <font color=\"#FF0000\"><strong>Edited/Modified</strong></font> Succesfully!</div></center>";
				include "ModNewsArticles.php";
			} else {
				echo mysql_error();
				header ("Location: admin.php");
			}			
	}

	//Delete News/Articles
	if ($NewsArticles == "Delete") {
		$rq = "SELECT picture from tbl_news_articles where id=$id";
		$re = mysql_query($rq);
		$show = @mysql_fetch_array($re);
		
		if ($show){
			@unlink("../contents/att_news_articles/$show[picture]");
		
			$query = "DELETE FROM tbl_news_articles WHERE id = '$id'";
			$result = mysql_query($query);
			
				if ($result) {
					echo "<meta http-equiv=\"refresh\" content=\"0;URL=?AdminPageID=Contents&List=ListingDB&ViewDB=NewsArticles\">";
					echo "&nbsp;<span class=\"text\"><font color=\"#FF0000\"><strong>Redirecting....</strong></font></span>";
				} 
				else {
					echo "<script> alert('Error: News/Articles could not Delete')</script>";
				}
		}
	}
	
//================================ For Notice Section ================================
	//Edit Notices
	if ($Notice == "Edit") {
		$headlines	=	trim($_POST['headlines']);
		$headlines	=	addslashes($headlines);
		$contents	=	trim($_POST['contents']);
		$contents	=	addslashes($contents);
		$contents	=	str_replace("\n","<BR>",$contents);
		$query = "UPDATE tbl_notice SET headlines='$headlines', contents='$contents' WHERE id = '$id'";
		$result = mysql_query($query);
			if ($result) {
				echo "<br><div align=\"center\">Notice has been <font color=\"#FF0000\"><strong>Edited/Modified</strong></font> Succesfully!</div></center>";
				include "ModNotice.php";
			} else {
				echo mysql_error();
				header ("Location: admin.php");
			}			
	}

	//Delete Notice
	if ($Notice == "Delete") {
		$query = "DELETE FROM tbl_notice WHERE id = '$id'";
		$result = mysql_query($query);
			
		if ($result) {
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=?AdminPageID=Contents&List=ListingDB&ViewDB=Notice\">";
			echo "&nbsp;<span class=\"text\"><font color=\"#FF0000\"><strong>Redirecting....</strong></font></span>";
		} 
		else {
			echo "<script> alert('Error: Notice could not Delete')</script>";
		}
	}

//================================ For Notes Section ================================
	//Edit Notes
	if ($Notes == "Edit") {
		$sub_name	=	trim($_POST['sub_name']);
		$sub_name	=	addslashes($sub_name);
		$desc	=	trim($_POST['desc']);
		$desc	=	addslashes($desc);
		$desc	=	str_replace("\n","<BR>",$desc);
		$sem	=	$_POST['sem'];
		$sub_by	=	$_POST['sub_by'];
		if ($sem == "---") {
			echo "&nbsp;&nbsp;<font color=\"#FF0000\"><strong>Error:</strong></font> Please select semester!";
			include "ModNotes.php";
		}
		else {
		
		$query = "UPDATE tbl_note SET sub_name='$sub_name', sub_desc='$desc', sub_sem='$sem', submitted_by='$sub_by' WHERE nt_id = '$id'";
		$result = mysql_query($query);
			if ($result) {
				echo "<br><div align=\"center\">Notice has been <font color=\"#FF0000\"><strong>Edited/Modified</strong></font> Succesfully!</div></center>";
				include "ModNotes.php";
			} else {
				echo mysql_error();
				header ("Location: admin.php");
			}
		}			
	}

	//Delete Notes
	if ($Notes == "Delete") {
		// Get Dir Path
		$base_dir='../contents/notes/';
		
		//Select filename to remove
		$strSql		=	"SELECT sub_file FROM tbl_note WHERE nt_id='$id'";
		$dbSql		=	mysql_query($strSql);
		$revfn		=	mysql_fetch_array($dbSql);
		$Att_File	=	mysql_result($dbSql,0,0);
		
		//now remove att. file
		@unlink($base_dir.$Att_File);
		
		$query = "DELETE FROM tbl_note WHERE nt_id = '$id'";
		$result = mysql_query($query);
			
		if ($result) {
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=?AdminPageID=Contents&List=ListingDB&ViewDB=Notes\">";
			echo "&nbsp;<span class=\"text\"><font color=\"#FF0000\"><strong>Redirecting....<br>&nbsp;Deleted: $revfn[sub_file]</strong></font></span>";
		} 
		else {
			echo "<script> alert('Error: Note could not Delete')</script>";
		}
	}

//================================ For Events Section ================================
	//Edit Events
	if ($Events == "Edit"){
		$events	=	trim($_POST['events']);
		$events	=	addslashes($events);
		$events	=	str_replace("\n","<BR>",$events);
		$query = "UPDATE tbl_events SET date='$_POST[date]', events='$events' WHERE id = '$id'";
		$result = mysql_query($query);
			if ($result) {
				echo "<br><div align=\"center\">Event has been <font color=\"#FF0000\"><strong>Edited/Modified</strong></font> Succesfully!</div></center>";
				include "ModEvents.php";
			} else {
				echo mysql_error();
				header ("Location: admin.php");
			}			
	}

	//Delete Events
	if ($Events == "Delete") {
		$query = "DELETE FROM tbl_events WHERE id = '$id'";
		$result = mysql_query($query);
			
			if ($result) {
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=?AdminPageID=Contents&List=ListingDB&ViewDB=Events\">";
				echo "&nbsp;<span class=\"text\"><font color=\"#FF0000\"><strong>Redirecting....</strong></font></span>";
			} 
			else {
				echo "<script> alert('Error: Events could not Delete')</script>";
			}
	}
	
//================================ For Links Section ================================
	//Edit Links
	if ($Links == "Edit"){
		$name	=	trim($_POST['name']);
		$name	=	addslashes($name);
		$name	=	str_replace("\n","<BR>",$name);
		$url	=	trim($_POST['url']);
		$url	=	addslashes($url);
		$url	=	str_replace("\n","<BR>",$url);
		$description	=	trim($_POST['description']);
		$description	=	addslashes($description);
		$description	=	str_replace("\n","<BR>",$description);
		$query = "UPDATE tbl_links SET name='$name', url='$url', description='$description' WHERE id = '$id'";
		$result = mysql_query($query);
			if ($result) {
				echo "<br><div align=\"center\">Links has been <font color=\"#FF0000\"><strong>Edited/Modified</strong></font> Succesfully!</div></center>";
				include "ModLinks.php";
			} else {
				echo mysql_error();
				header ("Location: admin.php");
			}			
	}

	//Delete Links
	if ($Links == "Delete") {
		$query = "DELETE FROM tbl_links WHERE id = '$id'";
		$result = mysql_query($query);
			
			if ($result) {
				echo "<meta http-equiv=\"refresh\" content=\"0;URL=?AdminPageID=Contents&List=ListingDB&ViewDB=Links\">";
				echo "&nbsp;<span class=\"text\"><font color=\"#FF0000\"><strong>Redirecting....</strong></font></span>";
			} 
			else {
				echo "<script> alert('Error: Links could not Delete')</script>";
			}
	}
	
	//================================ For Courses Section ================================
	//Edit Courses
	if ($Courses == "Edit") {
	
	//if radiobuttoncheck is insereted
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
						
						//fasdjsadflasd;fsdajfkjsadkjf
	
		$cos_name	=	trim($_POST['cos_name']);
		$cos_name	=	addslashes($cos_name);
		$cos_desc	=	trim($_POST['cos_desc']);
		$cos_desc	=	addslashes($cos_desc);
		$cos_desc	=	str_replace("\n","<BR>",$cos_desc);
		
		
//		$query = "UPDATE tbl_comp_course SET cos_code='$_POST[cdno]', cos_name='$cos_name', cos_description='$cos_desc', cos_sem='$_POST[sem]' WHERE cos_id = '$id'";
		
		
		$query = "update tbl_comp_course set  
		grade='$_POST[sem]',
		subject='$cos_name',
		description='$cos_desc',
		fullmark='$fm',
		passmark='$pm',
		th_fullmark='$t_fm',
		th_passmark='$t_pm',
		pr_fullmark='$p_fm',
		pr_passmark='$p_pm',
		flag='$_POST[type]' where comp_cos_id = '$id' "; 
	
	
		$result = mysql_query($query);
			if ($result) {
				echo "<br><div align=\"center\">Courses has been <font color=\"#FF0000\"><strong>Edited/Modified</strong></font> Succesfully!</div></center>";
				include "ModCourses.php";
			} else {
				echo mysql_error();
				header ("Location: admin.php");
			}			
	}

	//Delete Courses
	if ($Courses == "Delete") {
		$query = "DELETE FROM tbl_comp_course WHERE comp_cos_id = '$id'";
		$result = mysql_query($query);
			
		if ($result) {
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=?AdminPageID=Contents&List=ListingDB&ViewDB=Courses\">";
			echo "&nbsp;<span class=\"text\"><font color=\"#FF0000\"><strong>Redirecting....</strong></font></span>";
		} 
		else {
			echo "<script> alert('Error: Course could not Delete')</script>";
		}
	}
	
	//Edit Results
	if ($Result == "Edit") {
						$comp1 = $_POST['comp1'];
						$comp2 = $_POST['comp2'];
						$comp3 = $_POST['comp3'];
						$comp4 = $_POST['comp4'];
						$comp5 = $_POST['comp5'];
						
						$comp1_TM = $_POST['comp1TM'];
						$comp2_TM = $_POST['comp2TM'];
						$comp3_TM = $_POST['comp3TM'];
						$comp4_TM = $_POST['comp4TM'];
						$comp5_TM = $_POST['comp5TM']; 
						
						$comp1_PM = $_POST['comp1PM'];
						$comp2_PM = $_POST['comp2PM'];
						$comp3_PM = $_POST['comp3PM'];
						$comp4_PM = $_POST['comp4PM'];
						$comp5_PM = $_POST['comp5PM'];
						
						$resid1 = $_POST['resid1'];
						$resid2 = $_POST['resid2'];
						$resid3 = $_POST['resid3'];
						$resid4 = $_POST['resid4'];
						$resid5 = $_POST['resid5']; 
						
							$stdID	=	$_POST['id'];
						
						
						$Updt1	=	mysql_query("UPDATE tbl_result SET 
						mark ='$comp1',
						th_mark_obtain = '$comp1_TM',
						pr_mark_obtaiin = '$comp1_PM'
						WHERE res_id='$resid1' AND std_id=$stdID");
						
						$Updt2	=	mysql_query("UPDATE tbl_result SET 
						mark ='$comp2',
						th_mark_obtain = '$comp2_TM',
						pr_mark_obtaiin = '$comp2_PM'
						WHERE res_id='$resid2' AND std_id=$stdID");
						
						$Updt3	=	mysql_query("UPDATE tbl_result SET 
						mark ='$comp3',
						th_mark_obtain = '$comp3_TM',
						pr_mark_obtaiin = '$comp3_PM'
						WHERE res_id='$resid3' AND std_id=$stdID");
						
						$Updt4	=	mysql_query("UPDATE tbl_result SET 
						mark ='$comp4',
						th_mark_obtain = '$comp4_TM',
						pr_mark_obtaiin = '$comp4_PM'
						WHERE res_id='$resid4' AND std_id=$stdID");
						
						$Updt5	=	mysql_query("UPDATE tbl_result SET 
						mark ='$comp5',
						th_mark_obtain = '$comp5_TM',
						pr_mark_obtaiin = '$comp5_PM'
						WHERE res_id='$resid5' AND std_id=$stdID");
						
						if ($Updt1) {
				echo "Result was successfully modified!";
			}
			else {
				echo "Modification unsuccess!";
			}
	
	/*
	
		//adsfjasdfjlsadjflsad;jflsadf asd;klfjsadlkfsda
		if(isset($_POST['count'])) {
			$count = $_POST['count'];
			//echo "<p align=\"left\">Result for: $_POST[StdName]</p><p align=\"left\">";
			for($i = 1; $i < $count + 1; $i++){
				if(isset($_POST["grade".$i])) {
								
				//get post vars
					$grade	=	$_POST["grade".$i];
					$stdID	=	$_POST['id'];
					$resID	=	$_POST['res_id'.$i];
									
					$Updt	=	mysql_query("UPDATE tbl_result SET grade='$grade' WHERE res_id='$resID' AND std_id=$stdID");
					if($grade=="")continue;
					
				}
				else {
					echo "<span class=\"text\"><font color=\"#FF0000\"><strong>Error:</strong></font> Could not modify</span>";
				}
			} // end of for
			$Msg1 = "&nbsp;&nbsp;<span class=\"text\"><font color=\"#FF0000\"><strong>Status: </strong></font>"; 
			$Msg2 = "</span><br>";
			if ($Updt) {
				echo $Msg1."Result was successfully modified!".$Msg2;
			}
			else {
				echo $Msg1."Modification unsuccess!".$Msg2;
			}
			include "ModResults.php";*/
		//adjfadjsflsdafjsdklajf;lasdkfsadfsadfassdaf
			//echo "</p>";
		} // end of if isset count.
	
?>