<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	include ("../include/db.php");
	
	$sortby = $_GET['sortby'];
	
	$srh_q = "SELECT * FROM tbl_lib_book ORDER BY $sortby ASC";
	$srh_r = mysql_query($srh_q);
	$srh_n = mysql_num_rows($srh_r);
	
	if ($srh_r) {
		if ($srh_n) {
			echo "&nbsp;&nbsp;<span class=\"text\"><strong>::</strong> No. of book(s) found: <strong><font color='#FF0000'>$srh_n</font></strong></span>";
				//Show Found Books
			?>
	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_jumpMenu(targ,selObj,restore){ //v3.0
	  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	  if (restore) selObj.selectedIndex=0;
	}
	//-->
	</script>
	<script language="JavaScript" type="text/JavaScript">
	<!--
	function MM_findObj(n, d) { //v4.01
	  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
	  if(!x && d.getElementById) x=d.getElementById(n); return x;
	}
	
	function MM_jumpMenuGo(selName,targ,restore){ //v3.0
	  var selObj = MM_findObj(selName); if (selObj) MM_jumpMenu(targ,selObj,restore);
	}
	//-->
	</script>
	  
	  <table width="500" border="0" align="center" cellpadding="1" cellspacing="0">
        <tr class="text"> 
          <td width="9" background="../manage/images/bks/button1_fill.gif"><strong>&nbsp;</strong></td>
          <td width="60" background="../manage/images/bks/button1_fill.gif"><strong>&nbsp;Code No</strong></td>
          <td width="200" background="../manage/images/bks/button1_fill.gif"><strong>Name</strong></td>
          <td width="174" background="../manage/images/bks/button1_fill.gif"><strong>Author</strong></td>
          <td width="57" colspan="3" background="../manage/images/bks/button1_fill.gif">
		  <form name="sort"> 
			<select name="Sort" onChange="MM_jumpMenu('parent',this,0)" class="sort_box">
			  <option selected>Sort -></option>
			  <option value="?MemberPageID=BookList&sortby=code_no">Code</option>
			  <option value="?MemberPageID=BookList&sortby=bk_name">Book</option>
			  <option value="?MemberPageID=BookList&sortby=bk_author">Author</option>
			</select>
		  </form>
		  </td>
        </tr>
        	<?
			while ($show = mysql_fetch_array($srh_r)) {
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
		  <td width="19"> 
           	<?php
				echo "<center><a href=\"#\" onClick=\"MM_openBrWindow('" . $AppConts . "BookDetails.php?id=$show[code_no]','Books','scrollbars=yes,width=650,height=370')\"><img src=\"../images/icons/ico_detail.gif\" border=\"0\" align=\"middle\" alt=\"View Details: $show[bk_name]\"></a></center>";
			?>
          </td>
          <td width="19"> 
            <?php
				if ($show['bk_out_qty'] > 0) {
					echo "<center><a href=\"#\" onclick=\"alert('You don\'t have Permission to Modify: \\nBook is in use.')\"><img src='../images/icons/ico_edit.gif' border='0'></a></center>";
				}
				else {
					echo "<center><a href=\"?MemberPageID=BookModify&id=".$show[bk_id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit: $show[bk_name]\"></a></center>";
				}
			?>
          </td>
          <td width="19"> 
            <?php
				if ($show[bk_out_qty] > 1) {
					echo "<center><a href=\"#\" onclick=\"alert('You don\'t have Permission to Delete: \\nBook is in use.')\"><img src='../images/icons/ico_delete.gif' border='0'></a></center>";
				}
				else {
					echo "<center><a href=\"?MemberPageID=Book_ENF&Book=Delete&id=".$show[bk_id]."\" onclick=\"return confirm('Are you sure to delete:- \\nBook: $show[bk_name] \\nAuthor: $show[bk_author]')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Record ($show[bk_name])\"></a></center>";		
				}
			?>
          </td>
        </tr>
        <?			
			} // End of While...
		?>
</table>
	  <?
	  	}
	}
	  
?>