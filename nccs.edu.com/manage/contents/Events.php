<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
	// Gives total number of members...
	include ("../include/db.php");
	$qu = "SELECT * FROM tbl_events ORDER BY id DESC";
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
							echo "<span class=\"title\"><strong>::</strong> No Events has been submitted yet...</span>";
						}
						else {
							if ($num == 1) {
								echo "<span class=\"title\"><strong>::</strong> No. of Events: $first - $finish of $count</span>";	
							}
							else {
								echo "<span class=\"title\"><strong>::</strong> No. of Events: $first - $finish of $count</span>";
							}	
					?>
                  <table width="730" border="0" align="center" cellpadding="1" cellspacing="0" class="table">
                    <tr class="text"> 
                      <td width="130" height="22" bgcolor="#ECECEC"><strong>&nbsp;Submitted 
                        On </strong></td>
                      <td width="413" height="22" bgcolor="#ECECEC"><div align="left"><strong>Event(s)</strong></div></td>
                      <td width="130" bgcolor="#ECECEC"><strong>Date</strong></td>
                      <td width="57" height="22" colspan="3" bgcolor="#ECECEC">&nbsp;</td>
                    </tr>
                    <?
						while ($show = mysql_fetch_array($result)) {
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
							$len = strlen($show[events]);
							if ($len >= 65) {
								echo stripslashes(substr(str_replace("<br>", "", $show[events]),0,65)) . "...";
							}
							else {
								echo stripslashes($show[events]);
							}
					  	?>					  
					  </td>
                      <td><?=$show[date];?></td>
                      <td width="19"> 
                        <?
							echo "<center><div align=\"right\"><a href=\"#\" onClick=\"MM_openBrWindow('../contents/ViewEvents.php?id=$show[id]','Sports','scrollbars=yes,width=650,height=350')\" class=\"small_lk\"><img src='../images/icons/ico_detail.gif' border='0' title=\"View:".stripslashes(substr($show[events],0,65))."...\"></a></center>";
						?>
                      </td>
                      <td width="19"> 
                        <?
							echo "<center><a href=\"?AdminPageID=Contents&List=ListingDB&EditDB=ModEvents&id=".$show[id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit/Modify\"></a></center>";
						?>
                      </td>
                      <td width="19"> 
                        <?
							echo "<center><a href=\"?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&Events=Delete&id=".$show[id]."\" onclick=\"return confirm('Are you sure to delete this Event')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete\"></a></center>";						
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