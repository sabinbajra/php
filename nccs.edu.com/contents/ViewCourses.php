<?
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_comp_course WHERE comp_cos_id='".$_GET['id']."'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
?>
<title><? echo "$show[subject]";?></title>
<link href="../include/bcis.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellspacing="0" cellpadding="3" class="table">
  <tr class="EE">
    <td width="12%" class="text">Name</td>
    <td width="1%" class="text">:</td>
    <td colspan="3" class="text"><?=stripslashes($show['subject']);?></td>
  </tr>
  <tr class="EE">
    <td class="text">Grade</td>
    <td class="text">:</td>
    <td colspan="3" class="text"><?=$show['grade'];?></td>
  </tr>
  <tr class="EE">
    <td class="text">Description</td>
    <td class="text">:</td>
    <td colspan="3" class="text"><?=$show['description'];?></td>
  </tr>
  <?php if($show['flag']=='0')
  	{
		$fm=$show['fullmark'];
		$pm=$show['passmark'];
		$t_fm='X';
		$t_pm='X';
		$p_fm='X';
		$p_pm='X';
		 
		
	}
		else
		{
		$fm='X';
		$pm='X';
		$t_fm=$show['th_fullmark'];
		$t_pm=$show['th_passmark'];
		$p_fm=$show['pr_fullmark'];
		$p_pm=$show['pr_passmark'];
		}
  ?>
  
 
  <tr class="EE">
    <td class="text"><strong>Full Marks</strong></td>
    <td class="text">&nbsp;</td>
    <td width="10%" class="text"><?php echo $fm;?></td>
    <td width="13%" class="text"><strong>Pass Marks</strong></td>
    <td width="64%" class="text"><?php echo $pm;?></td>
  </tr>
  <tr class="EE">
    <td class="text"><strong>Theory</strong></td>
    <td class="text">&nbsp;</td>
    <td colspan="3" class="text">&nbsp;</td>
  </tr>
  <tr class="EE">
    <td class="text">Full Marks</td>
    <td class="text">&nbsp;</td>
    <td class="text"><?php echo $t_pm;?></td>
    <td class="text">Pass Marks</td>
    <td class="text"><?php echo $t_pm;?></td>
  </tr>
  <tr class="EE">
    <td class="text"><strong>Practical</strong></td>
    <td class="text">&nbsp;</td>
    <td colspan="3" class="text">&nbsp;</td>
  </tr>
  <tr class="EE">
    <td class="text">Full Marks</td>
    <td class="text">&nbsp;</td>
    <td class="text"><?php echo $p_pm;?></td>
    <td class="text">Pass Marks</td>
    <td class="text"><?php echo $p_pm;?></td>
  </tr>
  <tr class="EE">
    <td colspan="5" class="text1">
	<?
	$Desc = stripslashes($show["cos_description"]);
	echo $Desc;
	?></td>
  </tr>
</table>
