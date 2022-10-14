<?
	include ("../include/db.php");
	$query = "SELECT * FROM tbl_lib_book WHERE bk_id='".$_GET['id']."'";
	$result = mysql_query($query);
	$show = mysql_fetch_array($result);
?>
<br />
<form name="BookMod" method="post" action="?MemberPageID=Book_ENF&Book=Modify">
<input type="hidden" name="id" value="<?=$show['bk_id'];?>">
<table width="450" border="0" align="center" cellpadding="3" cellspacing="1" class="text">
    <tr valign="top"> 
      <td width="15%">Code No </td>
      <td width="4%"><div align="center">:</div></td>
      <td width="81%"><input name="cd_no" type="text" class="text_box" id="cd_no" value="<?=$show['code_no'];?>" size="15"></td>
    </tr>
    <tr valign="top"> 
      <td>Name</td>
      <td><div align="center">:</div></td>
      <td><input name="bk_name" type="text" class="text_box" id="bk_name" value="<?=$show['bk_name'];?>" size="50"></td>
    </tr>
    <tr valign="top"> 
      <td>Author</td>
      <td><div align="center">:</div></td>
      <td><input name="bk_author" type="text" class="text_box" id="bk_author" value="<?=$show['bk_author'];?>" size="50"></td>
    </tr>
    <tr valign="top"> 
      <td>Publisher</td>
      <td><div align="center">:</div></td>
      <td><input name="bk_publisher" type="text" class="text_box" id="bk_publisher" value="<?=$show['bk_publisher'];?>" size="50"></td>
    </tr>
    <tr valign="top">
      <td>Qty</td>
      <td><div align="center">:</div></td>
      <td><input name="qty" type="text" class="text_box" id="qty" size="15" value="<?=$show['qty'];?>" /></td>
    </tr>
    <tr valign="top">
      <td>Grade</td>
      <td><div align="center">:</div></td>
	  	<?
			// if ref. book
			if ($show['grade'] == 11) {
				$showbk_qty = "11";
			}
			else {
				$showbk_qty = "12";
			}
		?>
      <td><select name="grade" class="text_box" id="grade" >
            <option value="<?=$showbk_qty;?>" selected><?=$showbk_qty;?></option>
        <option>-------------------</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select></td>
    </tr>
    <tr valign="top"> 
      <td>Type</td>
      <td><div align="center">:</div></td>
      <td>
	  	<?
			// if ref. book
			if ($show['ref_yn'] == 1) {
				$showbk_typ = "Reference Book";
			}
			else {
				$showbk_typ = "Issue Book";
			}
		?>
		<select name="bk_type" id="bk_type" class="text_box">
          <option value="<?=$showbk_typ;?>" selected><?=$showbk_typ;?></option>
		  <option>-------------------</option>
		  <option>Reference Book</option>
		  <option>Issue Book</option>
      	</select>	  </td>
    </tr>
    <tr valign="top">
      <td>Image</td>
      <td><div align="center">:</div></td>
      <td><input name="browse" type="file" id="browse" value="<?=$show['img'];?>" class="text_box" /></td>
    </tr>
    <tr valign="top"> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" id="submit" value="Submit" class="text_box"></td>
    </tr>
</table>
</form>