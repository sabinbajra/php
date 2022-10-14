<?php
	include ($Includes . "db.php");

	//include ("../include/db.php");
	if(!isset($start)) $start = 0;
	$query = "SELECT * FROM tbl_note WHERE mem_id = '".$_SESSION['valid_id']."' order by nt_id DESC LIMIT " . $start . ", 20";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
	
	// Get Dir Path
	$path='contents/notes/';
	$base_dir='../contents/notes/';
?> 

<table width="510" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="289" height="22" class="text"> 
      <?php
      	if ($num == 1) {
			echo "<span class=\"text\">Total notes $num</span>";	
		}
		else {
			echo "<span class=\"text\">Total notes $num</span>";
		}
	?>    </td>
    <td width="221" class="text"><div align="right"><a href="?MemberPageID=NotePOST">Add/Post</a>&nbsp;</div></td>
  </tr>
  <tr>
    <td colspan="2">
	  <table width="510" border="0" cellpadding="1" cellspacing="0">
        <tr height="23"> 
          <td width="16" background="<?=$AdminImages;?>bks/button1_fill.gif" class="small">&nbsp;</td>
          <td width="118" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Submitted On</strong></td>
          <td width="70" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><div align="center"><strong>Grade</strong></div></td>
          <td width="249" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Subject</strong></td>
          <td width="57" colspan="3" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text">&nbsp;</td>
        </tr>
        	<?php
			  	while ($show = mysql_fetch_array($result)) {

					if ($alternate == "1") { 
						$color = "#FAFAFA"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#FFFFFF"; //"#F9F8FC"
						$alternate = "1";
					}
			?>
        <tr bgcolor="<?=$color;?>" class="EE"> 
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
          <td><div align="center">
            <?=$show[sub_sem];?>
          </div></td>
          <td><?php
					$len = strlen($show[sub_name]);
					if ($len >= 50) {
						$News	=	stripslashes($show[sub_name]);
						echo "<a href=\"#\" onClick=\"MM_openBrWindow('".$AppConts."ViewNote.php?id=".$show[id]."','News','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">".substr($News,0,50)."...</a>";
					}
					else {
						echo "<a href=\"#\" onClick=\"MM_openBrWindow('".$AppConts."ViewNote.php?id=".$show[id]."','News','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">$show[sub_name]</a>";						
					}
				?></td>
          <td width="17"> 
          <?
			echo "<center><a href=\"#\" onClick=\"MM_openBrWindow('../contents/NoteView.php?id=$show[nt_id]','Notes','scrollbars=yes,width=650,height=350')\" class=\"small_lk\"><img src='../images/icons/ico_detail.gif' border='0' title=\"View Note: $show[sub_name]\"></a></center>";
		  ?>          </td>
          <td width="17"> 
          <?
			echo "<center><a href=\"?MemberPageID=NoteModify&id=".$show[nt_id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit Note: $show[sub_name]\"></a></center>";
		  ?>          </td>
          <td width="17"> 
          <?
			echo "<center><a href=\"?MemberPageID=NoteENF&Db=DELETE&id=".$show[nt_id]."&mem_id=".$_SESSION['valid_id']."\" onclick=\"return confirm('Are you sure to delete this Note')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete Note: $show[sub_name]\"></a></center>";						
		  ?>          </td>
        </tr>
        <?php
				} // End of While			
		?>
      </table></td>
  </tr>
</table>
