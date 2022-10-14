<?php
	include ($Includes . "db.php");
	
	$GetPubUnPub = mysql_query("SELECT * FROM tbl_pub WHERE pub_id=1");
	$PubUnPub	=	mysql_fetch_array($GetPubUnPub);
	if ($PubUnPub['pub_val'] == 0) {
		if (empty($PubUnPub['pub_msg'])) {
			echo "";
		}
		else {
			echo "&nbsp;".$PubUnPub['pub_msg'];
		}
	}
	else {
		if (empty($PubUnPub['pub_msg'])) {
			echo "";
		}
		else {
			echo "&nbsp;".$PubUnPub['pub_msg'];
		}
?> 
<table width="503" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FCFCFC">
  <tr bgcolor="#FCFCFC" height="23"> 
    <td width="132" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Name</strong></td>
    <td width="73" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><div align="left"><strong>Full Mark</strong> </div></td>
    <td width="73" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><div align="left"><strong>Pass Mark</strong></div></td>
    <td width="100" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><div align="left"><strong>Score 
        Mark </strong></div></td>
  </tr>
  
  <tr>
  <td class="text"><strong>Compulsary</strong>:</td>
  
  </tr>
  
  <?
	$RsltQ = mysql_query("SELECT * FROM tbl_comp_course, tbl_result WHERE std_id=$_SESSION[valid_id] AND tbl_result.comp_cos_id=tbl_comp_course.comp_cos_id order by tbl_comp_course.flag DESC");

  $pass = 0;
  $count = 1;
  $sum=0;
  while ($RsltInfo = mysql_fetch_array($RsltQ)) {
  
 
  ?>
  
  
  <tr class="EE"> 
    <td height="46" bgcolor="#FFFFFF" class="text"> 
      <?=$RsltInfo['subject'];?>
    </td>
    <? if($RsltInfo['mark']!=0)
	{ 
	?>
    <td height="46" bgcolor="#FFFFFF" class="text"><div align="left"><?=$RsltInfo['fullmark']?></div></td>
    <td height="46" bgcolor="#FFFFFF" class="text"><div align="left"><?=$RsltInfo['passmark']?></div></td>
    <?
	}
	else
	{
	?>
    <td height="46" bgcolor="#FFFFFF" class="text"><div align="left" >TM: <?=$RsltInfo['th_fullmark']?><br>
        Pr M: <?=$RsltInfo['pr_fullmark']?></div></td>
    <td width="60" height="23" bgcolor="#FFFFFF" class="text" align="left"><div align="left">PM: <?=$RsltInfo['th_passmark']?><br>Pr PM: <?=$RsltInfo['pr_passmark']?></div></td>
    <?
	}
	?>
    <td width="53" align="center" bgcolor="#FFFFFF" class="text"> 
      <? 
	
	if($RsltInfo['mark']!=0)
	{
	?>
      <?
		
		if ($RsltInfo['mark'] <= "32" ) {
			echo "<font color=\"#FF0000\"><strong>".$RsltInfo['mark']."</strong></font>";
			$pass = 1;
			$sum += $RsltInfo['mark'];
		}
		else {
			echo $RsltInfo['mark'];
			$sum += $RsltInfo['mark'];
		}
		
		}
		
		if($RsltInfo['mark']=='0')
		{
			if($RsltInfo['th_mark_obtain'] <= 27){$sum += $RsltInfo['th_mark_obtain']; $pass = 1;
			echo "TM: <font color=\"#FF0000\"><strong>".$RsltInfo['th_mark_obtain']."</strong></font>";
			$remarks="Fail";}
			else{$sum += $RsltInfo['th_mark_obtain'];
		echo "TM: ".$RsltInfo['th_mark_obtain'];
		$remarks="Pass";}
		echo "<br>";
		if($RsltInfo['pr_mark_obtaiin'] <= 8){$sum += $RsltInfo['pr_mark_obtaiin']; $pass = 1;
		echo "PM: <font color=\"#FF0000\"><strong>".$RsltInfo['pr_mark_obtaiin']."</strong></font>";
		}
		else{
		echo "PM: ".$RsltInfo['pr_mark_obtaiin'];
		$sum += $RsltInfo['pr_mark_obtaiin'];
		}
			
			}?>
      <div align="right"></div></td>
	  
	  <? 
	  if($RsltInfo['grade'] == '11' && $count == '3')
	  
	  {
	  ?>
	  <br>
	  <tr>
  <td class="text"><strong>Optional</strong>:</td>
    </tr>
	<? } ?>
	
	
	<?
	if($RsltInfo['grade'] == '12' && $count == '2')
	  
	  {
	  ?>
	  <br>
	  <tr>
  <td class="text"><strong>Optional</strong>:</td>
    </tr>
	<? } ?>
	  
  </tr>
  <?
  
	++$count;
	}// end of while
  ?>
  <tr>
    <td class="text"><strong> Total : 
      <?= $sum ?>
      <br>
      Percent : 
      <?= $sum/5 ?>
      %<br>
	  Remarks:<? if($pass) echo "<font color='RED'>Fail</font>"; else echo "Pass"; ?>
      </strong></td>
    </tr>
</table>
<?
	}
	?>
