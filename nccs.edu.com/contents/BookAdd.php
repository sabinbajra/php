<br />
<form name="BookAdd" method="post" action="?MemberPageID=Book_ENF&Book=Add">
<table width="450" border="0" align="center" cellpadding="3" cellspacing="1" class="text">
    <tr valign="top"> 
      <td width="15%">Code No </td>
      <td width="4%"><div align="center">:</div></td>
      <td width="81%"><input name="cd_no" type="text" class="text_box" id="cd_no" size="15"></td>
    </tr>
    <tr valign="top"> 
      <td>Name</td>
      <td><div align="center">:</div></td>
      <td><input name="bk_name" type="text" class="text_box" id="bk_name" size="50"></td>
    </tr>
    <tr valign="top"> 
      <td>Author</td>
      <td><div align="center">:</div></td>
      <td><input name="bk_author" type="text" class="text_box" id="bk_author" size="50"></td>
    </tr>
    <tr valign="top"> 
      <td>Publisher</td>
      <td><div align="center">:</div></td>
      <td><input name="bk_publisher" type="text" class="text_box" id="bk_publisher" size="50"></td>
    </tr>
    <tr valign="top">
      <td>Qty</td>
      <td><div align="center">:</div></td>
      <td><input name="qty" type="text" class="text_box" id="qty" size="15" /></td>
    </tr>
    <tr valign="top">
      <td>Grade</td>
      <td><div align="center">:</div></td>
      <td><select name="grade" class="text_box" id="grade" >
        <option selected="selected"><-Select one-></option>
        <option>-------------------</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select></td>
    </tr>
    <tr valign="top">
      <td>Type</td>
      <td><div align="center">:</div></td>
      <td><select name="bk_type" id="bk_type" class="text_box">
        <option selected="selected"><-Select one-></option>
        <option>-------------------</option>
        <option>Reference Book</option>
        <option>Issue Book</option>
      </select></td>
    </tr>
    <tr valign="top"> 
      <td>Image</td>
      <td><div align="center">:</div></td>
      <td><input name="browse" type="file" id="browse" value="" class="text_box" /></td>
    </tr>
    <tr valign="top"> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" id="submit" value="Submit" class="text_box"></td>
    </tr>
</table>
</form>