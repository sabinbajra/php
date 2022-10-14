<table width="510" border="0" cellspacing="0" cellpadding="0" class="text">
  <tr> 
    <td width="7"><img src="../admin/images/bks/button1_left.gif" width="7" height="23"></td>
    <td width="510" background="../admin/images/bks/button1_fill.gif"><strong><img src="../images/icons/js.gif" width="16" height="16" align="absmiddle"> 
      Script(s) & Tutorial(s)</strong> </td>
    <td width="7"><img src="../admin/images/bks/button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
    <td colspan="3">
<table width="500" border="0" cellspacing="0" cellpadding="2" align="center" class="text">
        <tr>
          <td> 
            <?php
				// for Scripts/Tutorials...
				include ("../include/db.php");
				$QueryScripts = "SELECT * FROM tbl_scripts_tutorials ORDER BY id DESC";
				$RunQueryScripts = mysql_query($QueryScripts);
				$NumScripts = mysql_num_rows($RunQueryScripts);
	
				if ($NumScripts == 0) {
					echo "No Scripts/Tutorials has been uploaded...";
				}
				else {			
				?>
            <table width="96%" border="0" align="center" cellpadding="1" cellspacing="0" class="text2">
              <?php
						while ($ScriptsShow = mysql_fetch_array($RunQueryScripts)) {
						$path = "../contents/dnld_scpts_tutos/";
				  ?>
              <tr> 
                <td width="18%"><strong>Submitted On</strong></td>
                <td width="2%"><div align="center">:</div></td>
                <td>[<?=$ScriptsShow[submitted_on];?>]</td>
              </tr>
              <tr> 
                <td valign="top"><strong>Name</strong></td>
                <td valign="top"> <div align="center">:</div></td>
                <td>
                  <?=$ScriptsShow[name];?>
                </td>
              </tr>
              <tr> 
                <td><strong>Size</strong></td>
                <td><div align="center">:</div></td>
                <td> 
                  <?php
							$size   = filesize($path . $ScriptsShow[filename]);
							if($size >= 1024*1024) {
								$size=vsprintf("%1.2f Mb", $size/(1024*1024) );
							}
							else if ($size >= 1024) {
								$size=vsprintf("%1.2f Kb",$size/1024 );
							}
							else {
								$size = $size . " Bytes";
							}
								echo $size;
					  ?>
                </td>
              </tr>
              <tr> 
                <td valign="top"><strong>Description</strong></td>
                <td valign="top"> <div align="center">:</div></td>
                <td> 
                  <?
				  	echo stripslashes($ScriptsShow[description]);
				  ?>
                </td>
              </tr>
              <tr> 
                <td><strong>FileName</strong></td>
                <td><div align="center">:</div></td>
                <td width="79%" valign="middle"> <img src="../images/icons/<?php
						 $ext=array();
				
						 $ext=explode(".",$ScriptsShow[filename],strlen($ScriptsShow[filename]));
						 $extn=$ext[count($ext)-1];
						 switch (($extn) )
						 {
						 case "fla":
						 case "swf":
						 echo "fla.gif";
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
				
						 case "doc":
						 echo "doc.gif";
						 break;
				
						 case "rtf":
						 echo "rtf.gif";
						 break;
				
						 case "ppt":
						 echo "ppt.gif";
						 break;
				
						 case "exe":
						 case "bat":
						 case "EXE":
						 case "com":
						 echo "exe.gif";
						 break;
				
						 default :
						 echo "ukn.gif";
						 break;
						 }
					?>" border="0" align="absmiddle"> <a href="<?=$path;?><?=$ScriptsShow[filename];?>" target="_blank"> 
                  <?=$ScriptsShow[filename];?>
                  </a> </td>
              </tr>
              <tr> 
                <td colspan="3" height="10"><img src="../../images/spacer.gif" width="1" height="1"></td>
              </tr>
              <tr class="EE"> 
                <td colspan="3" height="1"><img src="../../images/spacer.gif" width="1" height="1"></td>
              </tr>
              <?			
						} // End of While $ScriptsShow...
					?>
            </table>
            <?
				} // End of Else for Scripts & Tutorials...
				?>	
          </td>
        </tr>
      </table>	
	</td>
  </tr>
</table>