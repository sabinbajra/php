<?	
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_members, tbl_students WHERE tbl_members.id=tbl_students.id AND tbl_members.id=$_REQUEST[id]";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	
?>
<form name="mod_result" method="post" action="?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&Result=Edit">
<input type="hidden" name="id" value="<?=$_REQUEST['id'];?>" />
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr> 
    <td colspan="2" ><center>      
		<table border="0" cellspacing="1" cellpadding="2" id="uploadtable">
          <tr> 
            <td width="105" valign="top" class="text"><strong>Registration No.</strong></td>
            <td width="71" class="text"><?=$show[reg_no];?></td>
          </tr>
          <tr> 
            <td valign="top" class="text"><strong>Name</strong></td>
            <td class="text"><?=$show[firstname] . " " . $show[middlename] . " " . $show[lastname];?></td>
          </tr>
		  <tr> 
            <td valign="top" class="text"><strong>Gender</strong></td>
            <td class="text"><?=$show['gender'];?></td>
          </tr>
		  <tr> 
            <td class="text"><strong>Semester</strong></td>
            <td class="text"><?=$show['semester'];?></td>
          </tr>
          <tr> 
            <td class="text"><strong>Year/Batch</strong></td>
            <td class="text"><?=$show['year_batch'];?></td>
          </tr>
          <tr> 
            
			 <td width="105" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Name</strong></td>
    <td width="71" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><div align="left"><strong>Full 
        Mark</strong> </div></td>
    <td width="81" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><div align="left"><strong>Pass 
        Mark</strong></div></td>
    <td width="73" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><div align="left"><strong>Score 
        Mark </strong></div></td>
  </tr>
  <? 
	   
	 
	   
	$RsltQ = mysql_query("SELECT * FROM tbl_comp_course, tbl_result WHERE std_id=$show[id] AND tbl_result.comp_cos_id=tbl_comp_course.comp_cos_id order by tbl_comp_course.flag DESC");

  $pass = 0;
  $count = 1;
  $sum=0;
  
  	$Val = 1;
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
    <td width="46" height="23" bgcolor="#FFFFFF" class="text" align="left"><div align="left">PM: 
        <?=$RsltInfo['th_passmark']?>
        <br>
        Pr PM: 
        <?=$RsltInfo['pr_passmark']?>
      </div></td>
    <?
	}
	?>
    <td width="206" align="center" bgcolor="#FFFFFF" class="text"> 
      <? 
	
	if($RsltInfo['mark']!=0)
	{
	?>
      <?
		
		if ($RsltInfo['mark'] <= "32" ) {
		?>
	
<input name="comp<?=$Val;?>" type="text" value="<?=$RsltInfo['mark']?>" size="4">
	<input name="resid<?=$Val;?>" type="hidden" value="<?=$RsltInfo['res_id']?>">	
		<?
		
		
			//echo "<font color=\"#FF0000\"><strong>".$RsltInfo['mark']."</strong></font>";
			$pass = 1;
			$sum += $RsltInfo['mark'];
		}
		else {
		?>
		<input name="comp<?=$Val;?>" type="text" value="<?=$RsltInfo['mark']?>" size="4">
			<input name="resid<?=$Val;?>" type="hidden" value="<?=$RsltInfo['res_id']?>">
			<?
			$sum += $RsltInfo['mark'];
		}
		
		}
		
		if($RsltInfo['mark']=='0')
		{
			if($RsltInfo['th_mark_obtain'] <= 27){$sum += $RsltInfo['th_mark_obtain']; $pass = 1;
			
			?>
				<input name="resid<?=$Val;?>" type="hidden" value="<?=$RsltInfo['res_id']?>">
		<input name="comp<?=$Val;?>TM" type="text" value="<?=$RsltInfo['th_mark_obtain']?>" size="4">
			<?
		}
			else{$sum += $RsltInfo['th_mark_obtain'];
		echo "TM: "?>
			<input name="resid<?=$Val;?>" type="hidden" value="<?=$RsltInfo['res_id']?>">
		<input name="comp<?=$Val;?>TM" type="text" value="<?=$RsltInfo['th_mark_obtain']?>" size="4">
			<? 
			
		}
		echo "<br>";
		if($RsltInfo['pr_mark_obtaiin'] <= 8){$sum += $RsltInfo['pr_mark_obtaiin']; $pass = 1;
		echo "PM: "?>
			<input name="resid<?=$Val;?>" type="hidden" value="<?=$RsltInfo['res_id']?>">
		<input name="comp<?=$Val;?>PM" type="text" value="<?=$RsltInfo['pr_mark_obtaiin']?>" size="4">
			<? 
		}
		else{
		echo "PM: "?>
			<input name="resid<?=$Val;?>" type="hidden" value="<?=$RsltInfo['res_id']?>">
		<input name="comp<?=$Val;?>PM" type="text" value="<?=$RsltInfo['pr_mark_obtaiin']?>" size="4">
			<? 
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
  	$Val++;
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


    </table>
    <br></td>
			
			
			
              
              <br /></td>
          </tr>
		  <tr>
            <td colspan="2"><input type="submit" name="Submit" value="Save" class="search_box1" /> <input type="button" name="Submit" value="List Result" onClick="window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=Results'" class="search_box1">			  
			</td>
          </tr>
        </table>
   </td>
  </tr>
</table></form>
