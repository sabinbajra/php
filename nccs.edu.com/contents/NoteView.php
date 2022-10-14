<?	
	session_start();
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_note WHERE nt_id='".$_GET['id']."'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
	// Get Dir Path
	$path='contents/notes/';
	$base_dir='../contents/notes/';
?>
<title><? echo stripslashes($show[headlines]);?></title>
<link href="../include/bcis.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="3" class="table">
  <tr>
	<td width="18%" valign="top" class="text">Subject Name </td>
	<td width="2%" valign="top" class="text">:</td>
	<td width="100%" class="text"><?=stripslashes($show[sub_name]);?></td>
    <td width="38" class="text"><?=$AppTable;?></td>
  </tr>
    <tr class="EE">
	<td class="text">Semester</td>
	<td class="text">:</td>
	<td colspan="2" class="text"><?=$show[sub_sem];?></td>
  </tr>
    <tr class="EE">
	<td class="text">Filename</td>
	<td class="text">:</td>
	<td colspan="2" class="text"><?=$show[sub_file];?>
	<img src="../images/icons/<?php
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
					?>" border="0" align="absmiddle"> <a href="<?=$base_dir.$show['sub_file'];?>" target="_blank" onclick="return confirm('Download Note!\n\n Semester: <?=$show['sub_sem'];?>\n Sub Name: <?=$show['sub_name'];?>\n Filename: <?=$show['sub_file'];?>')">Download</a> 
	</td>
  </tr>
  <tr class="EE">
	<td class="text">Submitted By</td>
	<td class="text">:</td>
	<td colspan="2" class="text">
	<?
		if (empty($show[submitted_by])) {
			echo "-----";
		}
		else {
			echo "$show[submitted_by]";
		}
	?>
	</td>
  </tr>
  <tr class="EE">
	<td class="text">Submitted Date</td>
	<td class="text">:</td>
	<td colspan="2" class="text"><?=$show[submitted_on];?></td>
  </tr>
  <tr class="EE">
	<td colspan="4" class="text1">
	<?
		$DetailContents = stripslashes($show[sub_desc]);
		echo "$DetailContents";
	?>
	<br><br></td>
  </tr>
</table>