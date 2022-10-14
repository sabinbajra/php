<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	include ("../include/db.php");
	$id = $_GET['id'];
	$query = "Select * from tbl_comp_course where comp_cos_id = $id";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	/*
	?>
	<br><form action="?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&Courses=Edit&id=<?=$id;?>" method="post">
		<input type="hidden" name="id" value="<?=$show['cos_id'];?>">
		  <table width="85%" border="0" cellspacing="1" cellpadding="3" align="center">
			<tr> 
              <td width="63" class="text"><strong>Semester</strong></td>
              <td width="256"><select name="sem" id="sem" class="search_box1">
                <option value="<?=$show['cos_sem'];?>" selected="selected"><?=$show['cos_sem'];?></option>
				<option>---</option>
				<option>1st</option>
                <option>2nd</option>
                <option>3rd</option>
                <option>4th</option>
                <option>5th</option>
                <option>6th</option>
                <option>7th</option>
                <option>8th</option>
              </select></td>
            </tr>
			<tr> 
              <td class="text"><strong>Code No</strong></td>
              <td><input name="cdno" type="text" value="<?=$show['cos_code'];?>" class="search_box1" size="15"></td>
            </tr>
			<tr>
			  <td class="text">Course Name</td>
			  <td class="text"><input type="text" name="cos_name" size="100" value="<?=$show['cos_name'];?>" class="search_box1"></td>
			</tr>
			<tr>
			  <td class="text" valign="top">Description</td>
			  <td><textarea name="cos_desc" cols="100" rows="8" class="search_box1"><?=str_replace("<BR>","\n",stripslashes($show['cos_description']));?></textarea></td>
			</tr>
			<tr>
			  <td class="text">&nbsp;</td>
			  <td><input type="submit" name="submit" value="Edit" class="search_box1">
			  <?
				if ($EditDB == "DatabaseENF") {
					echo "<input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=Courses'\" class=\"search_box1\">";
				}
			  ?>
			  </td>
			</tr>
		  </table>
		</form><br>
		*/
		?>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr> 
    <td><center>
<form action="?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&Courses=Edit&id=<?=$id;?>" method="post">          <table border="0" cellspacing="1" cellpadding="2" id="uploadtable">
            <tr> 
              <td width="97" class="text"><strong>Grade</strong></td>
              <td colspan="3">
              
              <? if($show['grade']==11)
			  {?>
			  <select name="sem" id="sem" class="search_box1">
			  <option selected="selected" value="11">Class 11</option>
                <option value="12">Class 12</option></select>
			  <? }
			  else{
			  ?>
			  <select name="sem" id="sem" class="search_box1">
			  <option selected="selected" value="12">Class 12</option>
                <option value="11">Class 11</option></select>
			  <? } ?>
                
              
              </td>
            </tr>
			<tr> 
              <td class="text"><strong>Subject Type</strong></td>
              <td colspan="3"><label>
              
                <? if($show['flag']=='1')
			  {?>
                <select name="type" id="type">
                 <option selected="selected" value="1">Compulsary</option>
                <option value="">Optional</option>
                </select>
                 <? }
			  else{
			  ?>
			  <select name="type" id="type">
                 <option selected="selected" value="">Optional</option>
                <option value="1">Compulsary</option>
                </select>
                <?
				}
			  ?>
              </label></td>
			</tr>
			<tr> 
              <td class="text"><strong>Course Name</strong></td>
              <td colspan="3"><input name="cos_name" type="text" class="search_box1" size="100" value="<?= $show['subject']; ?>"></td>
            </tr>
            <tr> 
              <td valign="top" class="text"><strong>Description</strong></td>
              <td colspan="3"><strong> 
                <textarea name="cos_desc" cols="100" rows="8" class="search_box1" id="contents"> <?= $show['description']; ?></textarea>
                </strong></td>
            </tr>
            <tr>
              <td valign="top" class="text"><div align="right">
                <strong>
                <label>                </label>
                </strong>
                <label><div align="left"></div>
                </label>
                <div align="left"><strong>
                  <input type="radio" name="radio" id="radio2" value="0" />
                  Full Marks</strong></div>
              </div></td>
              <td><input type="text" name="fm" id="fm" class="search_box1" value="<?= $show['fullmark']; ?>" /></td>
              <td><div align="right"><span class="text"><strong>Pass Marks</strong></span></div></td>
              <td><input type="text" name="pm" id="pm"  class="search_box1" value="<?= $show['passmark']; ?>"/></td>
            </tr>
            <tr>
              <td valign="top" class="text">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text"><label>
                <input type="radio" name="radio" id="radio" value="1" />
              </label></td>
              <td width="151"><label></label></td>
              <td width="89">&nbsp;</td>
              <td width="369">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text"><strong>Theory</strong></td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text"><div align="right"><strong>F.M</strong></div></td>
              <td><input type="text" name="t_fm" id="t_fm"  class="search_box1" value="<?= $show['th_fullmark']; ?>"/></td>
              <td><div align="right"><span class="text"><strong> P.M</strong></span></div></td>
              <td><input type="text" name="t_pm" id="t_pm" class="search_box1" value="<?= $show['th_passmark']; ?>"/></td>
            </tr>
            <tr>
              <td valign="top" class="text">&nbsp;</td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text"><strong>Practical</strong></td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text"><div align="right"><strong> F.M</strong></div></td>
              <td><input type="text" name="p_fm" id="p_fm" class="search_box1" value="<?= $show['pr_fullmark']; ?>"/></td>
              <td><div align="right"><span class="text"><strong>P.M</strong></span></div></td>
              <td><input type="text" name="p_pm" id="p_pm" class="search_box1" value="<?= $show['pr_passmark']; ?>"/></td>
            </tr>
            <tr>
              <td valign="top" class="text">&nbsp;</td>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="text">&nbsp;</td>
              <td colspan="3"><input type="submit" name="Submit" value="Submit" class="search_box1">
			  <input type="button" name="Submit" value="List Courses" onClick="window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=Courses'" class="search_box1">			  </td>
            </tr>
          </table>
        </form>
      </center></td>
  </tr>
</table>
