<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}

	// Gives total number of members...
	include ("../include/db.php");
	$result = mysql_query("SELECT * FROM tbl_comp_course ORDER BY grade ASC");
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
				echo "<span class=\"title\"><strong>::</strong> No Courses has been added yet...</span>";
			}
			else {
				if ($num == 1) {
					echo "<span class=\"title\"><strong>::</strong> No. of Course: $first - $finish of $count</span>";	
				}
				else {
					echo "<span class=\"title\"><strong>::</strong> No. of Courses: $first - $finish of $count</span>";
				}	
			?>
          <table width="730" border="0" align="center" cellpadding="1" cellspacing="0" class="table">
            <tr class="text"> 
              <td width="71" height="22" bgcolor="#ECECEC"><strong>&nbsp;</strong></td>
              <td width="263" bgcolor="#ECECEC"><strong>Name </strong></td>
              <td width="102" bgcolor="#ECECEC"><div align="center"><strong>Grade</strong></div></td>
              <td width="224" height="22" bgcolor="#ECECEC"><div align="center"><strong>Course type</strong></div></td>
              <td height="22" colspan="3" bgcolor="#ECECEC">&nbsp;</td>
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
            <tr  <? 
		
			
			
			echo "bgcolor=$color";?> class="EE"> 
              <td>&nbsp;</td>
              <td><?=$show[subject];?></td>
              <td><div align="center">
                <?=$show[grade];?>
              </div></td>
              <td><div align="center">
                <?php 
			  			if($show['flag']=='0'){
							 $cos_type="Optional";
						}
						else
							 $cos_type="Compulsary";
			 
			  echo "$cos_type";
		
			  ?>
                
                
                 </div></td>
              <td width="18"> 
              <?
				echo "<center><a href=\"#\" onClick=\"MM_openBrWindow('../contents/ViewCourses.php?id=$show[comp_cos_id]','Courses','scrollbars=yes,width=650,height=350')\" class=\"small_lk\"><img src='../images/icons/ico_detail.gif' border='0' title=\"View Course: $show[subject]\"></a></center>";
			  ?>              </td>
              <td width="19"> 
              <?
				echo "<center><a href=\"?AdminPageID=Contents&List=ListingDB&EditDB=ModCourses&id=".$show['comp_cos_id']."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit Course: $show[subject]\"></a></center>";
			  ?>              </td>
              <td width="19"> 
              <?
				echo "<center><a href=\"?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&Courses=Delete&id=".$show['comp_cos_id']."\" onclick=\"return confirm('Are you sure to delete this Subject')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Course: $show[comp_cos_name]\"></a></center>";						
			  ?>              </td>
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