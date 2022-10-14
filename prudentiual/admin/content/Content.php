



<table width="100%" border="0" class="table	">
  <tr>
    <td colspan="3"> <img src="images/f.gif" width="19" height="19" /><SPAN class="title">Content :</SPAN></td>
  </tr>
</table>
<br />
<?
 if($edit == "home" || $edit == "aboutus" || $edit == "sitemap" || $edit == "balancesheet")
				{
							include "edit.php";
				}	
				else if($edited == "edit_enf")
				{
				include "edit_enf.php";
				}
				else if($view == "home" || $view == "aboutus " ||	$view == "sitemap" ||	$view == "balancesheet")
								{
								?>
								<table width="100%" border="0" class="table">
  <tr>
    <td align="right"><label><a href="?adminID=Content&amp;edit=<? echo $view; ?>">Edit</a></label>
      <label>
      <input type="submit" name="Submit2" value="Back"  onClick = "javascript: history.back()" class="search_box1"/>
    </label></td>
  </tr>
</table>
<br>
								<?
								
								include "../$view.php";
								
								?>
								<br>
								<table width="100%" border="0" class="table">
  <tr>
    <td align="right"><label>
      <a href="?adminID=Content&amp;edit=<? echo $view; ?>">Edit</a>    </label>
      <label>
      <input type="submit" name="Submit2" value="Back"  onClick = "javascript: history.back()" class="search_box1"/>
    </label></td>
  </tr>
</table>					
<?			
								}
				
					else  //123 
					include "contents.php"; 
							//end of else 123
?>