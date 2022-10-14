<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}

	// Gives total number of Courses...
	$QCourses1 = mysql_query("SELECT * FROM tbl_opt_cos");
	$QCourses2 = mysql_query("SELECT * FROM tbl_comp_course");
	
	$CountCourses1 = mysql_num_rows($QCourses1);
	$CountCourses2 = mysql_num_rows($QCourses2);
	$CountCourses=$CountCourses1+$CountCourses2;
	
	// Gives total number of Results...
	$QCourses = mysql_query("SELECT * FROM tbl_result");
	$CountResults = mysql_num_rows($QCourses);
	
	// Gives total number of Event...	
	$QEvents = mysql_query("SELECT * FROM tbl_events");
	$CountEvents = mysql_num_rows($QEvents);
	
	// Gives total number of News Articles...
	$QNewsArticles = mysql_query("SELECT * FROM tbl_news_articles");
	$CountNewsArticles = mysql_num_rows($QNewsArticles);

	// Gives total number of Notice...
	$QNotice = mysql_query("SELECT * FROM tbl_notice");
	$CountNotice = mysql_num_rows($QNotice);
	
	// Gives total number of Notes...
	$QNote = mysql_query("SELECT * FROM tbl_notice");
	$CountNotes = mysql_num_rows($QNote);
	
	// Gives total number of Links...
	$QLinks = mysql_query("SELECT * FROM tbl_links");
	$CountLinks = mysql_num_rows($QLinks);
	
?> 

<table width="100%" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td class="title"> <img src="../images/icons/ico_open_folder1.gif" width="20" height="15" align="absmiddle"> 
      Contents </td>
  </tr>
  <tr>
    <td class="text"><hr size="1" color="#EEEFF9">
      <?php
			if ($Edit == "Introduction_BIM" || $Edit == "Introduction_NCCS" || $Edit == "Aims_Objectives" || $Edit == "Members_Profile" || $Edit == "SiteTeam" || $Edit == "Welcome" || $Edit == "Downloads" || $Edit == "Feedback" || $Edit == "Contact_Us" || $Edit == "Jokes") {
				include "Edit.php";
			}				
			else if ($Edited == "Edit_enf") {
				include "$Edited.php";
			}
			else if ($Added == "Add_enf") {
				include "$Added.php";
			}
			else if ($View == "Introduction_BIM" || $View == "Introduction_NCCS" || $View == "Aims_Objectives" || $View == "Members_Profile" || $View == "SiteTeam" || $View == "Welcome" || $View == "Downloads" || $View == "Feedback" || $View == "Contact_Us" || $View == "Jokes") {
				echo "
			  <table width=\"770\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"text\">
				<tr> 
				  <td width=\"1\"><img src=\"images/bks/button1_left.gif\" width=\"7\" height=\"23\"></td>
				  <td width=\"500\" background=\"images/bks/button1_fill.gif\"><strong><img src=\"../images/icons/dir.gif\" width=\"16\" height=\"13\" align=\"absmiddle\"> cms.nccs.com/contents/$View.php</strong> </td>
				  <td width=\"268\" background=\"images/bks/button1_fill.gif\" align=\"right\"><input type=\"button\" name=\"Submit\" value=\"Edit\" onClick=\"window.location='?AdminPageID=Contents&Edit=$View'\" class=\"search_box1\">
				<input type=\"button\" name=\"Submit\" value=\"Back\" onClick=\"javascript: history.back()\" class=\"search_box1\"></td>
				  <td width=\"1\"><img src=\"images/bks/button1_right.gif\" width=\"7\" height=\"23\"></td>
				</tr>
				
			  <tr> 
				<td height=\"250\" colspan=\"4\" bgcolor=\"#FFFFFF\">
				<table width=\"755\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" class=\"text\">
					<tr>
					  <td width=\"1\" background=\"images/bks/menubox_side_border.gif\"><img src=\"../images/bks/menubox_side_border.gif\" width=\"1\" height=\"28\"></td>
					  <td width=\"753\">
					  <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"1\" class=\"text\">
						<tr>
						 <td height=\"250\" valign=\"top\">";
				include "../contents/$View.php";
					echo "</td>
						 </tr>
					  </table>
					  </td>
					  <td width=\"1\" background=\"images/bks/menubox_side_border.gif\"><img src=\"../images/bks/menubox_side_border.gif\" width=\"1\" height=\"28\"></td>
					</tr>
				  </table> </td>
			  </tr>
			  
				<tr> 
				  <td width=\"1\"><img src=\"images/bks/button1_left.gif\" width=\"7\" height=\"23\"></td>
				  <td width=\"500\" background=\"images/bks/button1_fill.gif\">&nbsp;</td>
				  <td width=\"268\" background=\"images/bks/button1_fill.gif\" align=\"right\"><input type=\"button\" name=\"Submit\" value=\"Edit\" onClick=\"window.location='?AdminPageID=Contents&Edit=$View'\" class=\"search_box1\">
				<input type=\"button\" name=\"Submit\" value=\"Back\" onClick=\"javascript: history.back()\" class=\"search_box1\"></td>
				  <td width=\"1\"><img src=\"images/bks/button1_right.gif\" width=\"7\" height=\"23\"></td>
				</tr>
			  </table>";
			}
			else if ($List == "ListingDB") {
				include $List . ".php";
			} 
			else {
				?>		
      <table width="770" border="0" cellspacing="0" cellpadding="0" class="text">
        <tr> 
          <td width="7"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
          <td width="750" background="images/bks/button1_fill.gif"><strong><img src="../images/icons/dir.gif" width="16" height="13" align="absmiddle"> 
            About Us</strong> </td>
          <td width="7"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
        </tr>
        <tr> 
          <td colspan="3"> <div align="center"> 
              <table width="95%" border="0" cellspacing="0" cellpadding="0" class="text">
                <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
                  <td width="706"><img src="../images/spacer.gif" width="20" height="1">Introduction 
                    of BIM</td>
                  <td width="18"><div align="center"><a href="?AdminPageID=Contents&View=Introduction_BIM"><img src="../images/icons/fore.jpg" alt="View Introduction_BIM.php" width="15" height="15" border="0"></a></div></td>
                  <td width="40"><div align="left"><a href="?AdminPageID=Contents&Edit=Introduction_BIM"><img src="../images/icons/edit.gif" alt="Edit Introduction_BIM.php" width="23" height="22" border="0"></a></div></td>
                </tr>
                <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
                  <td><img src="../images/spacer.gif" width="20" height="1">Introduction 
                    of NCCS</td>
                  <td><div align="center"><a href="?AdminPageID=Contents&View=Introduction_NCCS"><img src="../images/icons/fore.jpg" alt="View Introduction_NCCS.php" width="15" height="15" border="0"></a></div></td>
                  <td><div align="left"><a href="?AdminPageID=Contents&Edit=Introduction_NCCS"><img src="../images/icons/edit.gif" alt="Edit Introduction_NCCS.php" width="23" height="22" border="0"></a></div></td>
                </tr>
                <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
                  <td><img src="../images/spacer.gif" width="20" height="1">Aims 
                    &amp; Objectives</td>
                  <td><div align="center"><a href="?AdminPageID=Contents&View=Aims_Objectives"><img src="../images/icons/fore.jpg" alt="View Aims_Objectives.php" width="15" height="15" border="0"></a></div></td>
                  <td><div align="left"><a href="?AdminPageID=Contents&Edit=Aims_Objectives"><img src="../images/icons/edit.gif" alt="Edit Aims_Objectives.php" width="23" height="22" border="0"></a></div></td>
                </tr>
              </table>
            </div></td>
        </tr>
        <tr> 
          <td width="7"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
          <td width="750" background="images/bks/button1_fill.gif"><strong><img src="../images/icons/dir.gif" width="16" height="13" align="absmiddle"> 
            Directory</strong> </td>
          <td width="7"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
        </tr>
        <tr> 
          <td colspan="3"><div align="center">
              <table width="95%" border="0" cellspacing="0" cellpadding="0" class="text">
                <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
                  <td width="706"><img src="../images/spacer.gif" width="20" height="1">Site 
                    Team </td>
                  <td width="18"><div align="center"><a href="?AdminPageID=Contents&View=SiteTeam"><img src="../images/icons/fore.jpg" alt="View SiteTeam.php" width="15" height="15" border="0"></a></div></td>
                  <td width="40"><div align="left"><a href="?AdminPageID=Contents&Edit=SiteTeam"><img src="../images/icons/edit.gif" alt="Edit SiteTeam.php" width="23" height="22" border="0"></a></div></td>
                </tr>
              </table>
            </div></td>
        </tr>
        <tr> 
          <td width="7"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
          <td width="750" background="images/bks/button1_fill.gif"><strong><img src="../images/icons/dir.gif" width="16" height="13" align="absmiddle"> 
            Roots</strong> </td>
          <td width="7"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
        </tr>
        <tr> 
          <td colspan="3"><div align="center">
              <table width="95%" border="0" cellspacing="0" cellpadding="0" class="text">
                <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
                  <td width="706"><img src="../images/spacer.gif" width="20" height="1">Home 
                    - Welcome Page</td>
                  <td width="18"><div align="center"><a href="?AdminPageID=Contents&View=Welcome"><img src="../images/icons/fore.jpg" alt="View Welcome.php" width="15" height="15" border="0"></a></div></td>
                  <td width="40"><div align="left"><a href="?AdminPageID=Contents&Edit=Welcome"><img src="../images/icons/edit.gif" alt="Edit Welcome.php" width="23" height="22" border="0"></a></div></td>
                </tr>
                <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
                  <td><img src="../images/spacer.gif" width="20" height="1">Downloads</td>
                  <td><div align="center"><a href="?AdminPageID=Contents&View=Downloads"><img src="../images/icons/fore.jpg" alt="View Downloads.php" width="15" height="15" border="0"></a></div></td>
                  <td><div align="left"><a href="?AdminPageID=Contents&Edit=Downloads"><img src="../images/icons/edit.gif" alt="Edit Downloads.php" width="23" height="22" border="0"></a></div></td>
                </tr>
                <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
                  <td><img src="../images/spacer.gif" width="20" height="1">Jokes</td>
                  <td><div align="center"><a href="?AdminPageID=Contents&View=Jokes"><img src="../images/icons/fore.jpg" alt="View Jokes.php" width="15" height="15" border="0"></a></div></td>
                  <td><div align="left"><a href="?AdminPageID=Contents&Edit=Jokes"><img src="../images/icons/edit.gif" alt="Edit Jokes.php" width="23" height="22" border="0"></a></div></td>
                </tr>
                <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE">
                  <td><img src="../images/spacer.gif" width="20" height="8">Contact 
                    Us </td>
<td><div align="center"><a href="?AdminPageID=Contents&View=Contact_Us"><img src="../images/icons/fore.jpg" alt="View Contact_Us.php" width="15" height="15" border="0"></a></div></td>
                  <td><div align="left"><a href="?AdminPageID=Contents&Edit=Contact_Us"><img src="../images/icons/edit.gif" alt="Edit Contact_Us.php" width="23" height="22" border="0"></a></div></td>
                </tr>
              </table>
            </div></td>
        </tr>
        <tr> 
          <td width="7"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
          <td width="750" background="images/bks/button1_fill.gif"><strong><img src="../images/icons/dir.gif" width="16" height="13" align="absmiddle"> 
            Databases</strong> </td>
          <td width="7"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
        </tr>
        <tr> 
          <td colspan="3"><div align="center">
            <table width="95%" border="0" cellspacing="0" cellpadding="0" class="text">
			  <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				<td width="706"><img src="../images/spacer.gif" width="20" height="8">Courses [<?=$CountCourses;?>]</td>
				<td width="18"><div align="center"><a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Courses"><img src="../images/icons/file.gif" alt="List Courses" width="14" height="16" border="0" /></a></div></td>
				<td width="40"><div align="left"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddCourses"><img src="../images/icons/edit.gif" alt="Add Courses" width="23" height="22" border="0"></a></div></td>
			  </tr>
			  <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
				<td><img src="../images/spacer.gif" width="20" height="8">Results [<?=$CountResults;?>]</td>
				<td><div align="center"><a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Results"><img src="../images/icons/file.gif" alt="List News/Articles" width="14" height="16" border="0"></a></div></td>
				<td><div align="left"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddResults"><img src="../images/icons/edit.gif" alt="Add News/Articles" width="23" height="22" border="0"></a></div></td>
			  </tr>
              <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
				<td><img src="../images/spacer.gif" width="20" height="8">News/Articles [<?=$CountNewsArticles;?>]</td>
				<td><div align="center"><a href="?AdminPageID=Contents&List=ListingDB&ViewDB=NewsArticles"><img src="../images/icons/file.gif" alt="List News/Articles" width="14" height="16" border="0"></a></div></td>
				<td><div align="left"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddNewsArticles"><img src="../images/icons/edit.gif" alt="Add News/Articles" width="23" height="22" border="0"></a></div></td>
			  </tr>
			  <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
				<td><img src="../images/spacer.gif" width="20" height="8">Notice [<?=$CountNotice;?>]</td>
				<td><div align="center"><a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Notice"><img src="../images/icons/file.gif" alt="List Notice(s)" width="14" height="16" border="0"></a></div></td>
				<td><div align="left"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddNotice"><img src="../images/icons/edit.gif" alt="Add Notice(s)" width="23" height="22" border="0"></a></div></td>
			  </tr>
			  <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
				<td><img src="../images/spacer.gif" width="20" height="8">Notes [<?=$CountNotes;?>]</td>
				<td><div align="center"><a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Notes"><img src="../images/icons/file.gif" alt="List Note(s)" width="14" height="16" border="0"></a></div></td>
				<td><div align="left"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddNotes"><img src="../images/icons/edit.gif" alt="Add Note(s)" width="23" height="22" border="0"></a></div></td>
			  </tr>
			  <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
				<td><img src="../images/spacer.gif" width="20" height="8">Events [<?=$CountEvents;?>]</td>
				<td><div align="center"><a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Events"><img src="../images/icons/file.gif" alt="List Events" width="14" height="16" border="0"></a></div></td>
				<td><div align="left"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddEvents"><img src="../images/icons/edit.gif" alt="Add Events" width="23" height="22" border="0"></a></div></td>
			  </tr>
				<!-- Download Stuffs -->
                <tr onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'" class="EE"> 
                  <td><img src="../images/spacer.gif" width="20" height="1">Links 
                    [<?=$CountLinks;?>]</td>
                  <td><div align="center"><a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Links"><img src="../images/icons/file.gif" alt="List Links" width="14" height="16" border="0"></a></div></td>
                  <td><div align="left"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddLinks"><img src="../images/icons/edit.gif" alt="Add LInks" width="23" height="22" border="0"></a></div></td>
                </tr>
              </table>
            </div>
            </td>
        </tr>
        <tr class="EE"> 
          <td colspan="3"><img src="../images/spacer.gif"></td>
        </tr>
      </table>
      <?
			} // End of Else...
		?>
    </td>
  </tr>
</table>