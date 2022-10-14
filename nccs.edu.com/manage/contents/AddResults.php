<form id="form1" name="form1" method="post" action="<?=$_SERVER['PHP_SELF'];?>?AdminPageID=Contents&List=ListingDB&AddDB=AddResults">
  <table border="0" align="center" cellpadding="2" cellspacing="1" id="uploadtable">
    <tr>
      <td width="110" class="text"><strong>Registration No </strong></td>
      <td width="150" ><input  name="reg" type="text" class="search_box1" value="<? if($_POST['reg'])
	  echo $_POST['reg'];
	  else
	  echo "NCCS-HSS-";
	  ?>"
      
       size="20" /></td>
      <td width="63" class="text"><strong>Grade</strong></td>
      <td width="86"><select name="sem" id="sem" class="search_box1">
	  <?
	  	if ($_POST) {
			echo "<option value=\"$_POST[sem]\" selected=\"selected\">$_POST[grade]</option>";
			echo "<option>---</option>";
		}
	  ?>s
          <option value="11">11</option>
          <option value="12">12</option>
          </select></td>
      <td width="283"><input type="submit" name="Submit" value="Entry Grades" class="search_box1" /></td>
    </tr>
  </table>
  <br>
</form>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr> 
    <td><center>
	<?
	 	if ($_POST['Submit']) {
			$CheckReg = mysql_query("SELECT reg_no, semester, id FROM tbl_students WHERE reg_no='$_POST[reg]'");
			$GetReg = mysql_fetch_array($CheckReg);
				
			if (($_POST['reg'] == $GetReg['reg_no']) && ($_POST['sem'] == $GetReg['semester'])) {
				
				$StdQInfo = mysql_query("SELECT * FROM tbl_members, tbl_students WHERE tbl_members.id=tbl_students.id AND tbl_students.reg_no='$GetReg[reg_no]'");
				
				 	$StdInfo = mysql_fetch_array($StdQInfo);
					$class = $StdInfo['semester'];		
				
				
$comp = mysql_query("select * from tbl_comp_course where grade='$GetReg[semester]' And flag='1'");

//loop ma ghumaunu parecha
//while($compcourse = mysql_fetch_array($comp))
//{
//echo $compcourse['subject'];
//}

$optcourse1 = mysql_query("select * from tbl_comp_course where comp_cos_id='$StdInfo[opt_cource_1]'");
$optcourse2 = mysql_query("select * from tbl_comp_course where comp_cos_id='$StdInfo[opt_cource_2]'");
$optcourse3 = mysql_query("select * from tbl_comp_course where comp_cos_id='$StdInfo[opt_cource_3]'");
	  
			   $optcourse_1 = mysql_fetch_array($optcourse1);
			    $optcourse_2 = mysql_fetch_array($optcourse2);
				 $optcourse_3 = mysql_fetch_array($optcourse3);
				
	?>        
	  <form name="add_result" method="post" action="?AdminPageID=Contents&Added=Add_enf&Db=<?=$AddDB;?>">
	  <input type="hidden" name="id" value="<?=$GetReg['id'];?>" />
		<table border="0" cellspacing="1" cellpadding="2" id="uploadtable">
          <tr> 
            <td width="108" valign="top" class="text"><strong>Name</strong></td>
            <td width="600" class="text"><?=$StdInfo['firstname']." ".$StdInfo['middlename']." ".$StdInfo['lastname'];?><input type="hidden" name="StdName" value="<?=$StdInfo['firstname']." ".$StdInfo['middlename']." ".$StdInfo['lastname'];?>" /></td>
          </tr>
		  <tr> 
            <td valign="top" class="text"><strong>Gender</strong></td>
            <td class="text"><?=$StdInfo['gender'];?></td>
          </tr>
          <tr> 
            <td class="text"><strong>Year/Batch </strong></td>
            <td class="text"><?=$StdInfo['year_batch'];?></td>
          </tr>
          <tr> 
          
            <td colspan="4" class="text"><br>
              <table width="523" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FCFCFC">
                <tr bgcolor="#FCFCFC">
                  <td width="17" class="text">&nbsp;</td>
                  <td width="291" class="text"><strong>Subject</strong></td>
                  <td class="text"><strong>Grade</strong></td>
                </tr>
                <?
			  	$Val = 1;
				while($compcourse = mysql_fetch_array($comp))
				{
			  ?>
             
			 
			 <? if($compcourse['fullmark']>0)
              {
			  ?>
                <tr>
                  <td bgcolor="#FFFFFF" class="text">
				 
				  <input type="hidden" name="CosID<?=$Val;?>" value="<? echo $compcourse['comp_cos_id']; ?>" /></td>
                  <td bgcolor="#FFFFFF" class="text"><?=$compcourse['subject'];?></td>
                    <td bgcolor="#FFFFFF"><input name="comp<?=$Val;?>" type="text" class="search_box1" value="<?=$_POST['comp'.$Val];?>" size="5" maxlength="4" /> 
                    </td>
				   <input type="hidden" name="comp" value="1" />
                   <input type="hidden" name="fullonly" value="1" />
                </tr>
            <? 
			}
			else 
				{
			?>
                <tr>
                  <td bgcolor="#FFFFFF" class="text">
				  <!-- <input type="hidden" name="CosID<?=$Val;?>" value="<?=$CrsInfo['cos_id'];?>" />--></td>
                    <td bgcolor="#FFFFFF" class="text">
                      <?=$compcourse['subject'];?>
                    </td>
                  <td bgcolor="#FFFFFF" class="text"><strong>TM</strong>
				   <input type="hidden" name="CosID<?=$Val;?>" value="<? echo $compcourse['comp_cos_id']; ?>" />
                    <input name="comp<?=$Val;?>TM" type="text" class="search_box1" value="<?=$_POST['comp'.$Val.'TM'];?>" size="5" maxlength="4" />
                    <strong>PM</strong>
                    <input name="comp<?=$Val;?>PM" type="text" class="search_box1" value="<?=$_POST['comp'.$Val.'PM'];?>" size="5" maxlength="4" /></td>
                 
                  <input type="hidden" name="compo" value="1" />
				  <input type="hidden" name="fullonly" value="1" />
                
                  <!--<input type="hidden" name="CrsCod<?=$Val;?>" value="<?=$CrsInfo['cos_code'];?>" />-->
                </tr>
                <? }
			  ?>
                <?
			  	$Val++;
				}// end of while
					
			  ?>
                <tr>
                  <td bgcolor="#FFFFFF" class="text">&nbsp;</td>
                  <td bgcolor="#FFFFFF" class="text"><strong>Optional</strong></td>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
               
                <tr>
                  <td bgcolor="#FFFFFF" class="text">&nbsp;</td>
                  <td bgcolor="#FFFFFF" class="text"><?=$optcourse_1['subject']; ?></td>
                    <td bgcolor="#FFFFFF" class="text"> 
                      <?php
                  		if($optcourse_1['fullmark']>0){
							?>
                      <input name="opt1" type="text" size="5" maxlength="4" class="search_box1" />
					  <input type="hidden" name="optCosID1" value="<?=$optcourse_1['comp_cos_id'];?>" /> 
                      <?
						}
						else {
                       ?>
                      <strong>TM</strong> 
                      <input name="opt1TM" type="text" size="5" maxlength="4"  class="search_box1"/>
                        <strong>PM</strong>
                        <input name="opt1PM" type="text" size="5" maxlength="4" class="search_box1" />
						<input type="hidden" name="optCosID1" value="<?=$optcourse_1['comp_cos_id'];?>" /> 
                      
                        <? 
						}?>				  </td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF" class="text">&nbsp;</td>
                  <td bgcolor="#FFFFFF" class="text"><?=$optcourse_2['subject']; ?></td>
                    <td bgcolor="#FFFFFF" class="text"> 
                      <?php
                  		if($optcourse_2['fullmark']>0){
							?>
                      <input name="opt2" type="text" size="5" maxlength="4" class="search_box1" />
					  <input type="hidden" name="optCosID2" value="<?=$optcourse_2['comp_cos_id'];?>" /> 
                       
                      <?
						}
						else {
                       ?>
                      <strong>TM</strong> 
					  					  <input type="hidden" name="optCosID2" value="<?=$optcourse_2['comp_cos_id'];?>" /> 

                      <input name="opt2TM" type="text" size="5" maxlength="4" class="search_box1" />
                        <strong>PM</strong>
                        <input name="opt2TM" type="text" size="5" maxlength="4"  class="search_box1"/>
                    <? 
						}?>&nbsp;</td>
                </tr>
                
				
				
				
				<? if($StdInfo['semester']=='12')
				{
				?>
                
                <tr>
                  <td bgcolor="#FFFFFF" class="text">&nbsp;</td>
                  <td bgcolor="#FFFFFF" class="text"><?=$optcourse_3['subject']; ?></td>
                  <td bgcolor="#FFFFFF" class="text"> <?php
                  		if($optcourse_3['fullmark']>0){
							?>
												  <input type="hidden" name="optCosID3" value="<?=$optcourse_3['comp_cos_id'];?>" /> 

                    <input name="opt3" type="text" size="5" maxlength="4" class="search_box1" />
                        <?
						}
						else {
                       ?>					  <input type="hidden" name="optCosID2" value="<?=$optcourse_2['comp_cos_id'];?>" /> 

                        <strong>TM</strong>
                        <input name="opt3TM" type="text" size="5" maxlength="4" class="search_box1" />
                        <strong>PM</strong>
                      <input namvie="opt3PM" type="text" size="5" maxlength="4"  class="search_box1"/>
                    <? 
						}?>&nbsp;</td>
                </tr>
                <? } ?>
              </table>
              <br /></td>
          </tr>
          
		  <tr>
            <td valign="top" class="text">&nbsp;</td>
			<input type="hidden" name="class" value="<?= $class; ?>" /> 
            <td colspan="3"><input type="submit" name="Submit" value="Save" class="search_box1">
              <input type="button" name="Submit" value="List Result" onClick="window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=Results'" class="search_box1">			  </td>
          </tr>
        </table>
      </form>
	<?
	  		}
			else {
				$ErrorS = "<p align=\"left\"><span class=\"text\">&nbsp;&nbsp;&nbsp;&nbsp;<font color=\"#FF0000\"><strong>Error:</strong></font> ";
				$ErrorF = "</span></p>";
				if (empty($_POST['reg'])) {
					echo $ErrorS."Enter valid Registration No.".$ErrorF;
				}
				else if ($_POST['sem'] == "---") {
					echo $ErrorS."Please select Semester!".$ErrorF;
				}
				else {
					echo $ErrorS."Either the Registration No. is wrong or<br>&nbsp;&nbsp;&nbsp;&nbsp;the student with this Registration No. does not belong to this Semester!".$ErrorF;
				}
			}
		}
		
	?>
    </center></td>
  </tr>
</table>
