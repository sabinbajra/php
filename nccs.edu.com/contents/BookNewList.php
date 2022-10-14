<div class="TabbedPanelsContent">
	<?
		include "../include/db.php"; 
		  
		//Display New books. 
		$bknewquery = "SELECT * FROM tbl_lib_book ORDER BY bk_id DESC LIMIT 5";
		$bknewresult = mysql_query($bknewquery);
		$bknewnum = mysql_num_rows($bknewresult);
	
		if (!bknewnum) {
			echo "<span class=\"login_sm_text\">No Books in the Library!</span>";
		}
		else {
		?>
		<table width="495" border="0" align="center" cellpadding="1" cellspacing="0">
          <tr class="text"> 
          	<td width="17" background="../manage/images/bks/button1_fill.gif"><strong>&nbsp;</strong></td>
          	<td width="64" background="../manage/images/bks/button1_fill.gif"><div align="left"><strong>&nbsp;Code No</strong></div></td>
          	<td width="209" background="../manage/images/bks/button1_fill.gif"><strong>Book Name</strong></td>
          	<td width="133" background="../manage/images/bks/button1_fill.gif"><strong>Author</strong></td>
          	<td colspan="3" background="../manage/images/bks/button1_fill.gif">&nbsp;</td>
          </tr>
        	<?
			while ($show = mysql_fetch_array($bknewresult)) {
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
          	<td> <div align="center"> 
            <?
				if ($show[ref_yn] == 1 && $show[in_out] != 1) {
					echo "<img src=\"../images/icons/b_blue.gif\" width=\"9\" height=\"9\" alt=\"Reference book!\"/>";
				}
				else if ($show[ref_yn] == 1 && $show[in_out] == 1) {
					echo "<img src=\"../images/icons/b_mul.gif\" width=\"9\" height=\"9\" alt=\"Reference book is in use!\"/>";
				}
				else {
					if ($show[in_out] == 0) { 
						echo "<img src=\"../images/icons/b_green.gif\" width=\"9\" height=\"9\" alt=\"Book is in the Library!\"/>";
					}
					else { 
						echo "<img src=\"../images/icons/b_red.gif\" width=\"9\" height=\"9\" alt=\"The book is in use!\"/>";
					}
				} 
			?>
          	</div></td>
          	<td>&nbsp;<?=$show[code_no];?>
          	</td>
          	<td> 
             <?=$show[bk_name];?>
          	</td>
          	<td> 
            <?=$show[bk_author];?>
          	</td>
		  	<td width="17"> 
           	<?php
				echo "<center><a href=\"#\" onClick=\"MM_openBrWindow('" . $AppConts . "BookDetails.php?id=$show[code_no]','Books','scrollbars=yes,width=650,height=370')\"><img src=\"../images/icons/ico_detail.gif\" border=\"0\" align=\"middle\" alt=\"View Details: $show[bk_name]\"></a></center>";
			?>          	</td>
          	<td width="18"> 
            <?php
				if ($show[bk_out_qty] > 0) {
					echo "<center><a href=\"#\" onclick=\"alert('You don\'t have Permission to Modify: \\nBook is in use.')\"><img src='../images/icons/ico_edit.gif' border='0'></a></center>";
				}
				else {
					echo "<center><a href=\"?MemberPageID=BookModify&id=".$show[bk_id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit: $show[bk_name]\"></a></center>";
				}
			?>          	</td>
          	<td width="23"> 
            <?php
				if ($show[bk_out_qty] > 1) {
					echo "<center><a href=\"#\" onclick=\"alert('You don\'t have Permission to Delete: \\nBook is in use.')\"><img src='../images/icons/ico_delete.gif' border='0'></a></center>";
				}
				else {
					echo "<center><a href=\"?MemberPageID=Book_ENF&Book=Delete&id=".$show[bk_id]."\" onclick=\"return confirm('Are you sure to delete:- \\nBook: $show[bk_name] \\nAuthor: $show[bk_author]')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[bk_name])\"></a></center>";		
				}
			?>          	</td>
          </tr>
          <?			
			} // End of While...
		  ?>
		</table>
		<?
		}
		?>
	</div>