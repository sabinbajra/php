<?	
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_members, tbl_students WHERE tbl_members.id=tbl_students.id AND tbl_members.id=$_GET[id]";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
?>
<title><?=$show[firstname] . " " . $show[middlename] . " " . $show[lastname];?></title>
<link href="../include/bcis.css" rel="stylesheet" type="text/css">
<hr size="2" color="#FF0000" >
<table width="100%" border="0" cellspacing="0" cellpadding="3" class="table">
  <tr> 
    <td width="141" valign="top" class="text">Registration No.</td>
    <td colspan="3" valign="top" class="text">: 
      <?=$show[reg_no];?>
    </td>
  </tr>
  <tr class="EE"> 
    <td class="text">Name</td>
    <td colspan="3" class="text">: 
      <?=$show[firstname] . " " . $show[middlename] . " " . $show[lastname];?>
    </td>
  </tr>
  <tr class="EE"> 
    <td class="text">Gender</td>
    <td colspan="3" class="text">: 
      <?=$show[gender];?>
    </td>
  </tr>
  <tr class="EE"> 
    <td class="text">Semester</td>
    <td colspan="3" class="text">: 
      <?=$show[semester];?>
    </td>
  </tr>
  <tr class="EE"> 
    <td class="text">Year/Batch</td>
    <td colspan="3" class="text">: 
      <?=$show[year_batch];?>
    </td>
  </tr>
  <tr>
    <td  colspan="4">&nbsp; </td>
  </tr>
  <tr bgcolor="#FCFCFC" height="23"> 
    <td width="141" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Name</strong></td>
    <td width="88" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><div align="left"><strong>Full 
        Mark</strong> </div></td>
    <td width="91" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><div align="left"><strong>Pass 
        Mark</strong></div></td>
    <td width="78" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><div align="left"><strong>Score 
        Mark </strong></div></td>
  </tr>
  <? 
	   
	 
	   
	$RsltQ = mysql_query("SELECT * FROM tbl_comp_course, tbl_result WHERE std_id=$show[id] AND tbl_result.comp_cos_id=tbl_comp_course.comp_cos_id order by tbl_comp_course.flag DESC");

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
    <td height="46" bgcolor="#FFFFFF" class="text"><div align="left"> 
        <?=$RsltInfo['fullmark']?>
      </div></td>
    <td height="46" bgcolor="#FFFFFF" class="text"><div align="left"> 
        <?=$RsltInfo['passmark']?>
      </div></td>
    <?
	}
	else
	{
	?>
    <td height="46" bgcolor="#FFFFFF" class="text"><div align="left" >TM: 
        <?=$RsltInfo['th_fullmark']?>
        <br>
        Pr M: 
        <?=$RsltInfo['pr_fullmark']?>
      </div></td>
    <td width="60" height="23" bgcolor="#FFFFFF" class="text" align="left"><div align="left">PM: 
        <?=$RsltInfo['th_passmark']?>
        <br>
        Pr PM: 
        <?=$RsltInfo['pr_passmark']?>
      </div></td>
    <?
	}
	?>
    <td width="273" align="center" bgcolor="#FFFFFF" class="text"> 
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
      Remarks: 
      <? if($pass) echo "<font color='RED'>Fail</font>"; else echo "Pass"; ?>
      </strong></td>
  </tr>
</table>
<?
	//}
	?>
<?  /*
		$RsltQ = mysql_query("SELECT * FROM tb.l_courses, tbl_result WHERE std_id=$show[id] AND tbl_result.cos_id=tbl_courses.cos_id");
		while ($RsltInfo = mysql_fetch_array($RsltQ)) {
	  ?>
<tr>
        <td bgcolor="#FFFFFF" class="text">&nbsp;<?=$RsltInfo['cos_code'];?></td>
        <td bgcolor="#FFFFFF" class="text"><?=$RsltInfo['cos_name'];?></td>
        <td bgcolor="#FFFFFF" class="text">
		  <div align="center">
		  <?
			if ($RsltInfo['grade'] <= "1.9") {
				echo "<font color=\"#FF0000\"><strong>".$RsltInfo['grade']."</strong></font>";
			}
			else {
				echo $RsltInfo['grade'];
			}
		  ?>
	      </div>
		</td>
      </tr>
      <?
		}// end of while 
	  */?>
    </table>
    <br></td>
  </tr>
</table>