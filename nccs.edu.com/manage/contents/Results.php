<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	

	// Gives total number of members...
	include ("../include/db.php");
	$qu = "SELECT * FROM tbl_members, tbl_students WHERE tbl_members.id=tbl_students.id ORDER BY tbl_students.semester ASC";
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
							echo "<span class=\"title\"><strong>::</strong> No Results has been submitted yet...</span>";
						}
						else {
							if ($num == 1) {
								echo "<span class=\"title\"><strong>::</strong> No. of Result: $first - $finish of $count</span>";	
							}
							else {
								echo "<span class=\"title\"><strong>::</strong> No. of Results: $first - $finish of $count</span>";
							}	
					?>
                  <table width="730" border="0" align="center" cellpadding="1" cellspacing="0" class="table">
                    <tr class="text"> 
                      <td width="121" height="22" bgcolor="#ECECEC"><strong>&nbsp;Registration No.</strong></td>
                      <td width="340" height="22" bgcolor="#ECECEC"><strong>Name</strong></td>
                      <td width="50" bgcolor="#ECECEC"><div align="center"><strong>Gender</strong></div></td>
                      <td width="87" bgcolor="#ECECEC"><div align="center"><strong>Grade</strong></div></td>
                      <td width="75" bgcolor="#ECECEC"><strong>Year/Batch</strong></td>
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
                      <td>&nbsp;<?=$show[reg_no];?></td>
                      <td><?=$show[firstname]." ".$show['middlename']." ".$show['lastname'];?></td>
                      <td><div align="center"> 
					  <?
						if ($show[gender]=="Male") {
							echo "<img src=\"../images/icons/male.gif\" width=\"10\" height=\"10\" alt=\"Male\">";
						}
						else if ($show[gender]=="Female"){
							echo "<img src=\"../images/icons/female.gif\" width=\"10\" height=\"10\" alt=\"Female\">";
						} 
					  ?>
					  </div></td>
                      <td><div align="center">
                        <?=$show[semester];?>
                      </div></td>
                      <td>
					    <div align="center">
					      <?=$show[year_batch];?>
			          </div></td>
                      <td width="19"> 
                        <?
							echo "<center><a href=\"#\" onClick=\"MM_openBrWindow('../contents/ViewResults.php?id=$show[id]','Results','scrollbars=yes,width=650,height=450')\" class=\"small_lk\"><img src='../images/icons/ico_detail.gif' border='0' title=\"View Result: $show[firstname]\"></a></center>";
						?>                      </td>
                      <td width="19"> 
                        <?
							echo "<center><a href=\"?AdminPageID=Contents&List=ListingDB&EditDB=ModResults&id=".$show[id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit Result: $show[firstname]\"></a></center>";
						?>                      </td>
                      <td width="19"> 
                        <?
							echo "<center><a href=\"?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&Results=Delete&id=".$show[id]."\" onclick=\"return confirm('Are you sure to delete this Result')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Result: $show[firstname]\"></a></center>";						
						?>                      </td>
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