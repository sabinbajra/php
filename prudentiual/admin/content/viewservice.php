<table width="100%" border="0" class="table	">
  <tr>
    <td colspan="3"> <img src="images/f.gif" width="19" height="19" /><SPAN class="title">Services:</SPAN></td>
  </tr>
</table><br>
<?
$view = $_GET['view'];
$edit = $_GET['edit'];
$edited = $_GET['edited'];

if($view)
{
?>

<table width="100%" border="0" class="table">
  <tr>
    <td align="right"><label><a href="?adminID=viewservice&amp;edit=<? echo $view; ?>">Edit</a></label>
      <label>
      <input type="submit" name="Submit2" value="Back"  onClick = "javascript: history.back()" class="search_box1"/>
    </label></td>
  </tr>
</table>
<br>

<?
	include "../contents/$view.php";
?>
<br>
								<table width="100%" border="0" class="table">
  <tr>
    <td align="right"><label>
      <a href="?adminID=viewservice&amp;edit=<? echo $view; ?>">Edit</a>    </label>
      <label>
      <input type="submit" name="Submit2" value="Back"  onClick = "javascript: history.back()" class="search_box1"/>
    </label></td>
  </tr>
</table>			
<?
}


if($edit)
{
	include  "editservice.php";
}

if($edited)
{
	include "editedservice.php";
}

?>