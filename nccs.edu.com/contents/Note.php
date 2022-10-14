<?php
	include ($Includes . "db.php");
	//include ("../include/db.php");
	if(!isset($start)) $start = 0;
	$query = "SELECT * FROM tbl_note order by nt_id DESC LIMIT " . $start . ", 20";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
	
	// Get Dir Path
	$path='contents/notes/';
	$base_dir='../contents/notes/';
	
?> 

<table width="510" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="114" height="22" class="text"> 
      <?php
      	if ($num == 1) {
			echo "<span class=\"text\">Total Notes $num</span>";	
		}
		else {
			echo "<span class=\"text\">Total Notes $num</span>";
		}
	?>
    </td>
  </tr>
  <tr>
    <td>
	  <table width="510" border="0" cellpadding="1" cellspacing="0">
        <?php
			if ($num == 0) {
		?>
        <tr bgcolor="#F3F1F9"> 
          <td class="text">&nbsp;No <strong>Notes</strong> has been submitted 
            yet...</td>
        </tr>
        <?php
			} // End of if($num == 0)
			else {
		?>
        <tr height="23"> 
          <td width="22" background="<?=$AdminImages;?>bks/button1_fill.gif" class="small">&nbsp;</td>
          <td width="118" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Submitted 
            On</strong></td>
          <td width="192" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Subject </strong></td>
          <td width="145" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Submitted By</strong></td>
          <td width="30" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Grade</strong></td>
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
          <td> 
            <?=$show[submitted_on];?>
          </td>
          <td> 
            <?php
					$len = strlen($show[sub_name]);
					if ($len >= 50) {
						$News	=	stripslashes($show[sub_name]);
						
						echo "<a href=\"#\" onClick=\"MM_openBrWindow('".$AppConts."NoteView.php?id=".$show[nt_id]."','Note','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">".substr($News,0,50)."...</a>";
					}
					else {
						echo "<a href=\"#\" onClick=\"MM_openBrWindow('".$AppConts."NoteView.php?id=".$show[nt_id]."','Note','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">".stripslashes($show[sub_name])."</a>";						
					}
				?>
          </td>
          <td><span class="small">
            <?
				  	if (empty($show[submitted_by])) {
						echo "-----";
					}
					else {
						echo "$show[submitted_by]";
					}
				  ?>
          </span></td>
          <td class="small"> 
            <div align="center">
              <?
				  	if (empty($show[sub_sem])) {
						echo "-----";
					}
					else {
						echo "$show[sub_sem]";
					}
				  ?>
            </div></td>
        </tr>
        <?php
				} // End of While			
			} //  End of Else
		?>
      </table></td>
  </tr>
</table>