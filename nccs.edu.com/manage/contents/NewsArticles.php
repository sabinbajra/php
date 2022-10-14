<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	

	// Gives total number of members...
	include ("../include/db.php");
	$qu = "SELECT * FROM tbl_news_articles ORDER BY id DESC";
	$result = mysql_query($qu);
	$count = mysql_num_rows($result);
?>
			<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="text">
			  <tr>
				<td height="250" valign="top">
					<?
						$num = mysql_num_rows($result);
						$finish = $start+$num;
						$first = $start+1;
						
						if ($num == 0) {
							echo "<span class=\"title\"><strong>::</strong> No News has been submitted yet...</span>";
						}
						else {
							if ($num == 1) {
								echo "<span class=\"title\"><strong>::</strong> No. of News: $first - $finish of $count</span>";	
							}
							else {
								echo "<span class=\"title\"><strong>::</strong> No. of News: $first - $finish of $count</span>";
							}	
					?>
                  <table width="730" border="0" align="center" cellpadding="1" cellspacing="0" class="table">
                    <tr class="text"> 
                      <td width="130" height="22" bgcolor="#ECECEC"><strong>&nbsp;Submitted 
                        On </strong></td>
                      <td width="393" height="22" bgcolor="#ECECEC"><div align="left"><strong>Headlines</strong></div></td>
                      <td width="150" bgcolor="#ECECEC"><strong>Submitted By</strong></td>
                      <td width="57" height="22" colspan="3" bgcolor="#ECECEC">&nbsp;</td>
                    </tr>
                    <?
						$new = 0;
						while ($show = mysql_fetch_array($result)) {
						if ($show[approved]==0) { // show total number of newly posted Articles
							$new++;
						}
							if ($alternate == "1") { 
								$color = "#FDFDF7"; 
								$alternate = "2"; 
							} 
							else { 
								$color = "#FFFFFF"; 
								$alternate = "1";
							}
					?>
                    <tr  <? echo "bgcolor=$color";?> class="EE"> 
                      <td>&nbsp;<?=$show[submitted_on];?></td>
                      <td>
					  <? 
					  	if ($show["approved"] == 0) {
							echo "<b>".stripslashes($show[headlines])."</b> [<font color=\"#FF0000\">new</font>]";
						}
						else if ($show["approved"] == 2) {
							echo "<b>".stripslashes($show[headlines])."</b> [<font color=\"#FF0000\">modified</font>]";
						}
						else if ($show["approved"] == 3) {
							echo "<b>".stripslashes($show[headlines])."</b> [<font color=\"#FF0000\">disapproved</font>]";
						}
						else {
					  		echo stripslashes($show[headlines]);
						}
					  ?>
					  </td>
                      <td>
					  <?
					  	if (empty($show[submitted_by])) {
							echo "---";
						}
						else {
							echo "$show[submitted_by]";
						}
						?></td>
                      <td width="19"> 
                        <?
							echo "<center><a href=\"#\" onClick=\"MM_openBrWindow('../contents/ViewNewsArticles.php?id=$show[id]','Sports','scrollbars=yes,width=650,height=350')\" class=\"small_lk\"><img src='../images/icons/ico_detail.gif' border='0' title=\"View News: $show[headlines]\"></a></center>";
						?>
                      </td>
                      <td width="19"> 
                        <?
							echo "<center><a href=\"?AdminPageID=Contents&List=ListingDB&EditDB=ModNewsArticles&id=".$show[id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit News: $show[headlines]\"></a></center>";
						?>
                      </td>
                      <td width="19"> 
                        <?
							echo "<center><a href=\"?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&NewsArticles=Delete&id=".$show[id]."\" onclick=\"return confirm('Are you sure to delete this News')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete News: $show[headlines]\"></a></center>";						
						?>
                      </td>
                    </tr>
					<?			
						} // End of while
					?>
                  </table>
					<?
						} // End of else
					?>
			    </td>
			  </tr>
		    </table>