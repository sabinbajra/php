<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}

?> 

<table width="770" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="122"  background="../images/titles/welcome.gif" bgcolor="#EFEFEF" valign="middle" class="title"><div align="right"></div></td>
    <td width="648" height="19" class="text"></td>
  </tr>
  <tr> 
    <td colspan="2"> <div align="center"> 
        <hr size="1">
        <br>
        <table width="765" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
          <tr> 
            <td width="418" class="text">&nbsp;You are logged in as <strong><?php echo $log_show[privilege];?></strong>!</td>
            <td width="347" class="text"><div align="right">
			<?
				if (empty($log_show[last_login])) {
					echo "";
				}
				else {
					echo "<strong>Last Login</strong>:&nbsp;". 
                $log_show[last_login];
				}
			?>
			&nbsp;</div></td>
          </tr>
        </table>
        <br>
        <table width="765" height="300" border="0" align="center" cellpadding="1" cellspacing="0" class="table">
          <tr valign="top"> 
            <td width="154" class="text"> 
              <?php
	$QueryUser  = "SELECT * FROM tbl_admin WHERE id=$_SESSION[valid_id]";
	$ResultUser = mysql_query($QueryUser);
	$ShowUser   = mysql_fetch_array($ResultUser);

	include ("../include/db.php");
	// Gives total number of Users...
		$QUser = "SELECT * FROM tbl_admin";
		$RUser = mysql_query($QUser);
		$CountUsers = mysql_num_rows($RUser);
	
	// Gives total number of Members...	
	$QMembers = "SELECT * FROM tbl_members";
	$RMembers = mysql_query($QMembers);
	$CountMembers = mysql_num_rows($RMembers);

	// Gives total number of Event...	
	$QEvents = "SELECT * FROM tbl_events";
	$REvents = mysql_query($QEvents);
	$CountEvents = mysql_num_rows($REvents);
	
	// Gives total number of Notice...	
	$QNotice = "SELECT * FROM tbl_notice";
	$RNotice = mysql_query($QNotice);
	$CountNotice = mysql_num_rows($RNotice);
	
	// Gives total number of News Articles...
	$QNewsArticles = "SELECT * FROM tbl_news_articles";
	$RNewsArticles = mysql_query($QNewsArticles);
	$CountNewsArticles = mysql_num_rows($RNewsArticles);
	
	// Total No. of New Articles...
	$QueryNArt = mysql_query("SELECT * FROM tbl_news_articles WHERE approved=0");
	$CountNArt = mysql_num_rows($QueryNArt);
	
	// Gives total number of Users Online...
	$QUserOnline = "SELECT * FROM online";
	$RUserOnline = mysql_query($QUserOnline);
	$CountUserOnline = mysql_num_rows($RUserOnline);
	
	// Gives total number of Members Online
	$QMemOnline = "SELECT * FROM tbl_members WHERE login_yn > 0";
	$RMemOnline = mysql_query($QMemOnline);
	$CountMemOnline = mysql_num_rows($RMemOnline);
	
// ============================================================================================================
				  echo "
				  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
					<tr> 
					  <td width=\"3%\"><img src=\"images/bks/menubox_top_left.gif\" width=\"5\" height=\"22\"></td>
					  <td width=\"8%\" background=\"images/bks/menubox_top_fill1.gif\" class=\"title\">Total!</td>
					  <td width=\"12%\"><img src=\"images/bks/menubox_top_center.gif\" width=\"22\" height=\"22\"></td>
					  <td width=\"74%\" background=\"images/bks/menubox_top_fill2.gif\">&nbsp;</td>
					  <td width=\"3%\"><img src=\"images/bks/menubox_top_right.gif\" width=\"5\" height=\"22\"></td>
					</tr>
				  </table>
				  <table width=\"154\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
					<tr class=\"EE\"> 
					  <td width=\"25\">&nbsp;<img src=\"../images/icons/users.gif\" width=\"13\" height=\"16\"></td>
					  <td width=\"85\">Admin Users</td>
					  <td width=\"44\">: $CountUsers</td>
					</tr>
					<tr class=\"EE\"> 
					  <td>&nbsp;<img src=\"../images/icons/members.gif\" width=\"18\" height=\"16\"></td>
					  <td>Members</td>
					  <td>: $CountMembers</td>
					</tr>
					<tr class=\"EE\"> 
					  <td>&nbsp;<img src=\"../images/icons/h.gif\" width=\"16\" height=\"16\"></td>
					  <td>Events</td>
					  <td>: $CountEvents</td>
					</tr>
					<tr class=\"EE\"> 
					  <td>&nbsp;<img src=\"../images/icons/file.gif\" width=\"16\" height=\"16\"></td>
					  <td>Notice</td>
					  <td>: $CountNotice</td>
					</tr>
					<tr class=\"EE\"> 
					  <td>&nbsp;<img src=\"../images/icons/rtf.gif\" width=\"16\" height=\"16\"></td>
					  <td>News & Articles</td>
					  <td>: $CountNArt/$CountNewsArticles</td>
					</tr>
				  </table>
				 <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
					<tr> 
					  <td width=\"3%\"><img src=\"images/bks/menubox_top_left.gif\" width=\"5\" height=\"22\"></td>
					  <td width=\"59%\" background=\"images/bks/menubox_top_fill1.gif\" class=\"title\">Users Online!</td>
					  <td width=\"12%\"><img src=\"images/bks/menubox_top_center.gif\" width=\"22\" height=\"22\"></td>
					  <td width=\"24%\" background=\"images/bks/menubox_top_fill2.gif\">&nbsp;</td>
					  <td width=\"3%\"><img src=\"images/bks/menubox_top_right.gif\" width=\"5\" height=\"22\"></td>
					</tr>
				  </table>
				  <table width=\"154\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">				  
					<tr class=\"EE\"> 
					  <td width=\"25\">&nbsp;<img src=\"../images/icons/users.gif\" width=\"13\" height=\"16\"></td>
					  <td width=\"85\">Site Users</td>
					  <td width=\"44\">: $CountUserOnline</td>
					</tr>
					<tr class=\"EE\"> 
					  <td width=\"25\">&nbsp;<img src=\"../images/icons/users.gif\" width=\"13\" height=\"16\"></td>
					  <td width=\"85\">Members</td>
					  <td width=\"44\">: $CountMemOnline</td>
					</tr>
				  </table>";
				  if ($CountMemOnline==0) {
				  	echo " ";
				  }
				  else {
				  echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
					<tr> 
					  <td width=\"3%\"><img src=\"images/bks/menubox_top_left.gif\" width=\"5\" height=\"22\"></td>
					  <td width=\"62%\" background=\"images/bks/menubox_top_fill1.gif\" class=\"title\">Online!</td>
					  <td width=\"12%\"><img src=\"images/bks/menubox_top_center.gif\" width=\"22\" height=\"22\"></td>
					  <td width=\"18%\" background=\"images/bks/menubox_top_fill2.gif\">&nbsp;</td>
					  <td width=\"3%\"><img src=\"images/bks/menubox_top_right.gif\" width=\"5\" height=\"22\"></td>
					</tr>
				  </table>
				  <table width=\"154\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
					<tr class=\"EE\">
					  <td colspan=\"3\">					
						<table width=\"130\" border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"#A7A1C7\" class=\"small\">";
						while ($show = mysql_fetch_array($RMemOnline)) {
						echo "
						  <tr bgcolor=\"#eff2f7\">
							<td width=\"14%\">&nbsp;<img src=\"../images/icons/mem_bullet.gif\" width=\"7\" height=\"7\"></td>
							<td width=\"86%\"> 
							  <a href=\"?AdminPageID=Members&View=Members_Profile&id=$show[id]\" class=\"small_lk\">$show[username]</a>
							</td>
						  </tr>";
						}
					echo"</table>
					  </td>
					</tr>
					<tr class=\"EE\"> 
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					</tr>
				  </table>";
				  }
					
	  ?>
            </td>
            <td width="1" background="../images/spacer.gif" bgcolor="#EEEFF9" class="text"><div align="right"> </div></td>
            <td width="455" class="text"><div align="center"> 
                <table width="100%" border="0" cellspacing="1" cellpadding="3">
                  <?
				  	if (empty($log_show[last_login])) {
					echo "
                  <tr class=\"EE\"> 
                    <td bgcolor=\"#FDFFD7\" class=\"text\"><div align=\"center\">You 
                        are logged in 1st time to this section... Please <strong>Modify</strong> 
                        your <strong>profile</strong>...</div></td>
                  </tr>
				  <tr class=\"EE\">
				    <td height=\"1\" background=\"../images/spacer.gif\"><img src=\"../images/spacer.gif\" width=\"1\" height=\"1\"></td>
				  </tr>";
					}
				  ?>
				  <tr>
                    <td class="title">
					<?
						if($News == "Post_News") {
							echo "Post New News";
						}
						else if($News == "RegisterENF") {
							echo "Confirmation";
						}
						else if($News == "List_News") {
							echo "News";
						}
						else if($Article == "Post_Articles") {
							echo "Post New Article";
						}
						else if($Article == "My_Profile_Enf") {
							echo "Confirmation";
						}
						else if($Article == "List_Articles") {
							echo "Article(s)";
						}
						else if ($Profile == "View_My_Profile") {
							echo "My Profile";
						}
						else if ($Profile == "Modify_My_Profile" || $Profile == "My_Profile_Enf") {
							echo "Modify my Profile";
						}
						else if($Pwd == "Change_Pwd" || $Pwd == "Change_Pwd_Enf") {
							echo "Change Password";
						}
						else {
							echo "Option";
						}
					?>
					</td>
                  </tr>
				  <!--  
                  <tr class="EE"> 
                    <td bgcolor="#FDFFD7" class="text"><div align="center">You 
                        are logged in 1st time to this section... Please Modify 
                        your profile...</div></td>
                  </tr>
				  <tr class="EE">
				    <td height="1" background="../images/spacer.gif"><img src="../images/spacer.gif" width="1" height="1"></td>
				  </tr>-->
                </table>
				<?
					if ($News == "Post_News" || $News == "RegisterENF" || $News == "List_News" || $News == "Modify_News") {
						include "profiles/" . $News . ".php";
					}
					else if ($Article == "Post_Articles" || $Article == "My_Profile_Enf" || $Article == "List_Articles") {
						include "contents/" . $Article . ".php";
					}
					else if ($Profile == "View_My_Profile" ||$Profile == "Modify_My_Profile" || $Profile == "My_Profile_Enf") {
						include "profiles/" . $Profile .".php";
					}
					else if ($Pwd == "Change_Pwd" || $Pwd == "Change_Pwd_Enf") {
						include "profiles/" . $Pwd . ".php";
					}
					else { // Option Table 
				?>
                <table width="90%" border="0" cellspacing="1" cellpadding="10">
                  <tr> 
                    <td width="12%"><div align="center">
					<a href="?pageID=home&Article=List_Articles"><img src="../images/icons/post_article.gif" alt="View Articles" width="32" height="32" border="0"></a></div></td>
					<td width="88%" class="text"><table width="320" border="0" cellspacing="0" cellpadding="0" class="text">
                        <tr>
                          <td width="118"><strong>News/Articles:</strong></td>
                          <td width="103"><strong>Notice:</strong></td>
                          <td width="93"><strong>Events:</strong></td>
                        </tr>
                        <tr>
                          <td><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddNewsArticles">Post</a> 
                      | <a href="?AdminPageID=Contents&List=ListingDB&ViewDB=NewsArticles">View</a></td>
                          <td><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddNotice">Post</a> 
                      | <a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Notice">View</a></td>
                          <td><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddEvents">Post</a> 
                      | <a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Events">View</a></td>
                        </tr>
                      </table>
				    </td>
                  </tr>
				  <tr> 
                    <td><div align="center"><a href="?pageID=home&Profile=View_My_Profile"><img src="../images/icons/file_manager.gif" alt="Publish/Unpublish Results" width="32" height="32" border="0"></a></div></td>
                    <td class="text"><strong>Results:</strong><br>
					<a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddResults">Post</a> 
                      | <a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Results">View</a>
					  | <a href="<?=$_SERVER['PHP_SELF'];?>?Page=Pub">Publish/Unpublish</a>	
					<?
						if ($_GET['Page'] == "PubUnPub") {
							include "../include/db.php";
							$pub_val = $_POST['pub_val'];
							$msg	=	trim($_POST['msg']);
							$msg	=	addslashes($msg);
							$msg	=	str_replace("\n","<BR>",$msg);
							$PutMSGq = mysql_query("UPDATE tbl_pub SET pub_msg='$msg', pub_val='$pub_val' WHERE pub_id=1");
							if ($PutMSGq) {
								echo "<br>";
								if ($pub_val == 1) {
									echo "Result has been published. Now Students, Teachers, Staffs or Members can see the result!";
								}
								else {
									echo "Result has been removed from publication. Now no one can see the result!";
								}
							}
						}
						if ($_GET['Page'] == "Pub") {
							//echo "<br>Publish / UnPublish";
							include "../include/db.php";
							$GetMSGq = mysql_query("SELECT * FROM tbl_pub");
							$GetMSG = mysql_fetch_array($GetMSGq);
							
							if ($GetMSG['pub_val'] == 0) {
								$BtnVal = "<input type=\"hidden\" name=\"pub_val\" value=\"1\">";
								$Btn	= "<input type=\"submit\" name=\"submit\" value=\"Publish Result\" class=\"search_box1\">";
							}
							else {
								$BtnVal = "<input type=\"hidden\" name=\"pub_val\" value=\"0\">";
								$Btn	= "<input type=\"submit\" name=\"submit\" value=\"Unpublish Result\" class=\"search_box1\">";
							}
					?>
					<form id="PubUnPub" name="PubUnPub" method="post" action="<?=$_SERVER['PHP_SELF'];?>?Page=PubUnPub">
					  <table width="320" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4F4F4" class="text">
                        <tr>
                          <td width="56" valign="top" bgcolor="#FCFCFC">Message</td>
                          <td width="264" bgcolor="#FCFCFC"><textarea name="msg" cols="42" rows="2" class="search_box1"><?=str_replace("<BR>","\n",stripslashes($GetMSG['pub_msg']));?></textarea></td>
                        </tr>
                        <tr>
                          <td bgcolor="#FCFCFC">&nbsp;</td>
                          <td bgcolor="#FCFCFC"><?=$BtnVal.$Btn;?></td>
                        </tr>
                      </table>
                    </form>
					<?
						}
					?>
					</td>
                  </tr>
                  <tr> 
                    <td><div align="center"><a href="?pageID=home&Profile=View_My_Profile"><img src="../images/icons/account_details.gif" alt="View Profile" width="32" height="32" border="0"></a></div></td>
                    <td class="text"><strong>My Profile:</strong><br>
					<a href="?AdminPageID=Option&Opt=My_Profile">View</a> | 
					<a href="?AdminPageID=Option&Opt=Modify_My_Profile&id=<?=$_SESSION[valid_id];?>">Modify</a>	
					</td>
                  </tr>
                  <tr> 
                    <td><div align="center"><a href="?PageID=home&Pwd=Change_Pwd"><img src="../images/icons/change_password.gif" alt="Change Password" width="32" height="32" border="0"></a></div></td>
                    <td class="text"><a href="?AdminPageID=Option&Opt=Change_Pwd">Change 
                      Password</a></td>
                  </tr>
                </table><? } // end of echo?>
              </div></td>

            <td width="1" background="../images/spacer.gif" bgcolor="#EEEFF9" class="text"><div align="right"> </div></td>
            <td width="154" class="text"> 
			  <table width="150" border="0" cellspacing="0" cellpadding="1">
			    <tr bgcolor="#FDFFD7" class="EE"> 
				  <td class="title" colspan=2>&nbsp;Register!</td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td width="22"><img src="../images/icons/edit.gif" width="23" height="22"></td>
				  <td width="163"><a href="?AdminPageID=Users&New=RegAdminUser">Admin User</a></td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td width="22"><img src="../images/icons/edit.gif" width="23" height="22"></td>
				  <td width="163"><a href="?AdminPageID=Registration">Student/Staff</a></td>
				</tr>
				<tr bgcolor="#FDFFD7" class="EE"> 
				  <td class="title" colspan=2>&nbsp;News & Articles!</td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td width="22"><img src="../images/icons/article.gif" width="23" height="22"></td>
				  <td width="163"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddNewsArticles">Post News/Articles</a></td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td width="22"><img src="../images/icons/article.gif" width="23" height="22"></td>
				  <td width="163"><a href="?AdminPageID=Contents&List=ListingDB&ViewDB=NewsArticles">View News/Articles</a></td>
				</tr>
				<tr bgcolor="#FDFFD7" class="EE"> 
				  <td class="title" colspan=2>&nbsp;Notice!</td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td width="22"><img src="../images/icons/article.gif" width="23" height="22"></td>
				  <td width="163"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddNotice">Post Notice </a></td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td width="22"><img src="../images/icons/article.gif" width="23" height="22"></td>
				  <td width="163"><a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Notice">View Notice </a></td>
				</tr>
				<tr bgcolor="#FDFFD7" class="EE"> 
				  <td class="title" colspan=2>&nbsp;Events!</td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td width="22"><img src="../images/icons/article.gif" width="23" height="22"></td>
				  <td width="163"><a href="?AdminPageID=Contents&List=ListingDB&AddDB=AddEvents">Post Events </a></td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td width="22"><img src="../images/icons/article.gif" width="23" height="22"></td>
				  <td width="163"><a href="?AdminPageID=Contents&List=ListingDB&ViewDB=Events">View Events </a></td>
				</tr>
				<tr bgcolor="#FDFFD7" class="EE"> 
				  <td class="title" colspan=2>&nbsp;Option!</td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td><img src="../images/icons/users.gif" width="13" height="16"></td>
				  <td><a href="?AdminPageID=Option&Opt=My_Profile">View My Profile</a></td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td><img src="../images/icons/users.gif" width="13" height="16"></td>
				  <td><a href="?AdminPageID=Option&Opt=Modify_My_Profile&id=<?=$_SESSION[valid_id];?>">Modify My Profile</a>
				  </td>
				</tr>
				<tr class="EE" onMouseOver="style.background='#EEEFF9'" onMouseOut="style.background='#FFFFFF'"> 
				  <td><img src="../images/icons/c_pwd.gif" width="23" height="22"></td>
				  <td><a href="?AdminPageID=Option&Opt=Change_Pwd">Change Password</a></td>
				</tr>
				<tr class="EE"> 
				  <td colspan=2>&nbsp;</td>
				</tr>
			  </table>
		    </td>
          </tr>
        </table>
        <br>
      </div></td>
  </tr>
</table>
