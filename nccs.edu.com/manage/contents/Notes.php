<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	// Get Dir Path
	$path='contents/notes/';
	$base_dir='../contents/notes/';

	// Gives total number of note...
	include ("../include/db.php");
	$result = mysql_query("SELECT * FROM tbl_note ORDER BY submitted_on ASC");
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
				echo "<span class=\"title\"><strong>::</strong> No Note has been added yet...</span>";
			}
			else {
				if ($num == 1) {
					echo "<span class=\"title\"><strong>::</strong> No. of Note: $first - $finish of $count</span>";	
				}
				else {
					echo "<span class=\"title\"><strong>::</strong> No. of Notes: $first - $finish of $count</span>";
				}	
			?>
          <table width="730" border="0" align="center" cellpadding="1" cellspacing="0" class="table">
            <tr class="text"> 
              <td width="22" height="22" bgcolor="#ECECEC">&nbsp;</td>
              <td width="125" bgcolor="#ECECEC"><strong>Submitted On </strong></td>
              <td width="351" bgcolor="#ECECEC"><strong>Subject </strong></td>
              <td width="145" bgcolor="#ECECEC"><strong>Submitted by </strong></td>
              <td width="30" height="22" bgcolor="#ECECEC"><div align="left"><strong>Semester</strong></div></td>
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
              <td><div align="center"><a href="<?=$base_dir.$show['sub_file'];?>" target="_blank" onclick="return confirm('Download Note!\n\n Semester: <?=$show['sub_sem'];?>\n Sub Name: <?=$show['sub_name'];?>\n Filename: <?=$show['sub_file'];?>')"><img src="../images/icons/<?php
					 $ext=array();
			
					 $ext=explode(".",$show[sub_file],strlen($show[sub_file]));
					 $extn=$ext[count($ext)-1];
					 switch (($extn) )
					 {
					 case "doc":
					 echo "doc.gif";
					 break;
					 
					 case "ppt":
					 echo "ppt.gif";
					 break;
			
					 case "jpg":
					 case "gif":
					 case "png":
					 echo "jpg.gif";
					 break;
			
					 case "bmp":
					 case "dib":
					 echo "bmp.gif";
					 break;
			
					 case "txt":
					 case "log":
					 echo "txt.gif";
					 break;
			
					 case "pdf":
					 echo "pdf.gif";
					 break;
			
					 case "zip":
					 case "rar":
					 case "tgz":
					 case "gz":
					 echo "zip.gif";
					 break;
			
					 default :
					 echo "ukn.gif";
					 break;
					 }
					?>" border="0" align="absmiddle">
                  </a> 
            </div></td>
              <td><?=$show[submitted_on];?></td>
              <td><?=$show[sub_name];?></td>
              <td><?=$show[submitted_by];?></td>
              <td><div align="center">
                <?=$show[sub_sem];?>
              </div></td>
              <td width="19"> 
              <?
				echo "<center><a href=\"#\" onClick=\"MM_openBrWindow('../contents/NoteView.php?id=$show[nt_id]','Notes','scrollbars=yes,width=650,height=350')\" class=\"small_lk\"><img src='../images/icons/ico_detail.gif' border='0' title=\"View Note: $show[sub_name]\"></a></center>";
			  ?>              </td>
              <td width="19"> 
              <?
				echo "<center><a href=\"?AdminPageID=Contents&List=ListingDB&EditDB=ModNotes&id=".$show['nt_id']."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit Note: $show[sub_name]\"></a></center>";
			  ?>              </td>
              <td width="19"> 
              <?
				echo "<center><a href=\"?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&Notes=Delete&id=".$show['nt_id']."\" onclick=\"return confirm('Are you sure to delete this Subject')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Note: $show[sub_name]\"></a></center>";						
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