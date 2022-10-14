<?
	session_start();
	
	if (!$_SESSION["valid_user"]) {
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
	}
	
	include ("../include/db.php");
	$id = $_GET['id'];
	$query = "Select * from tbl_note where nt_id = $id";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
	?>
	
	<br><form action="?AdminPageID=Contents&List=ListingDB&EditDB=DatabaseENF&Notes=Edit&id=<?=$id;?>" method="post">
	<input type="hidden" name="id" value="<?=$show[nt_id];?>">
	  <table width="85%" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr>
		  <td class="text">Semester</td>
		  <td class="text"><select name="sem" id="select" class="search_box1">
            <option value="<?=$show['sub_sem'];?>" selected="selected">
              <?=$show['sub_sem'];?>
            </option>
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
		  <td class="text">Sub Name </td>
		  <td class="text"><input type="text" name="sub_name" size="100" value="<?=$show['sub_name'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text" valign="top">Description</td>
		  <td><textarea name="desc" cols="100" rows="8" class="search_box1"><?=str_replace("<BR>","\n",stripslashes($show['sub_desc']));?></textarea></td>
		</tr>
		<tr>
		  <td class="text">Submitted by</td>
		  <td class="text"><input type="text" name="sub_by" size="100" value="<?=$show['submitted_by'];?>" class="search_box1"></td>
		</tr>
		<tr>
		  <td class="text">&nbsp;</td>
		  <td><input type="submit" name="submit" value="Edit" class="search_box1">
		  <?
			if ($EditDB == "DatabaseENF") {
				echo "<input type=\"button\" name=\"Submit\" value=\"Ok\" onClick=\"window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=Notes'\" class=\"search_box1\">";
			}
		  ?>
		  </td>
		</tr>
	  </table>
	</form>
	<br>