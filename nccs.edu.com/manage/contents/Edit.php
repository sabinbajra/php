<?
	session_start();
	
	if (!$_SESSION["valid_user"])
		{
		// User not logged in, redirect to login page
		Header("Location: ../index.php");
		}
	
?> 
<script language="Javascript1.2"><!-- // load htmlarea
_editor_url = "editor/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// --></script>



<script language="JavaScript1.2" defer>
var config = new Object(); // create new config object

config.width = "100%";
config.height = "300px";
config.bodyStyle = 'background-color: #FFFFFF; font-family: "arial, Verdana"; font-size: x-small;';
config.debug = 0;
config.stylesheet = "/style.css";

config.fontstyles = [{
  name: "Headline",
  className: "headline",
  classStyle: "font-family: arial; font-size: 28px;"
},{
  name: "Red Text",
  className: "saletext2",
  classStyle: "font-family: arial; font-size: 28px; color: red;"
}];


config.toolbar = [
  ['fontname'],
  ['fontsize'],
  ['fontstyle','separator'],
  ['bold','italic','underline','separator'],
  ['forecolor','backcolor','separator'],
  ['justifyleft','justifycenter','justifyright','separator',],
  ['strikethrough','subscript','superscript','separator'],
  ['OrderedList','UnOrderedList','separator','Outdent','Indent','separator'],
  ['HorizontalRule','separator','Createlink','separator','InsertImage','separator','inserttable','separator'],
  ['popupeditor','separator','htmlmode','separator']
 ]; 


// Add additional editor config settings here...

editor_generate('contents',config);


</script>

<form method="post" action="?AdminPageID=Contents&Edited=Edit_enf">
<input type="hidden" name="PageName" value="<?=$Edit;?>">
  <table width="100%"  border="0" cellspacing="0" cellpadding="0" class="text">
    <tr> 
      <td width="7"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
      <td width="605" background="images/bks/button1_fill.gif"><strong><img src="../images/icons/dir.gif" width="16" height="13" align="absmiddle"> 
        cms.nccs.com/contents/<?=$Edit;?>.php</strong> </td>
      <td width="264" background="images/bks/button1_fill.gif" align="right"><input type="button" name="Submit" value="View" onClick="window.location='?AdminPageID=Contents&View=<?php echo $Edit; ?>'" class="search_box1"> 
        <input type="button" name="Submit" value="Back" onClick="javascript: history.back()" class="search_box1"></td>
      <td width="7"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
    </tr>
    <tr> 
      <td colspan="4">
		<table width="755" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
		  <tr>
			<td width="1" background="images/bks/menubox_side_border.gif"><img src="../images/bks/menubox_side_border.gif" width="1" height="28"></td>
			<td width="753">
			  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="text">
				<tr>
				  <td height="250" valign="top">
					<textarea name="contents" cols="70" rows="8" class="text" id="contents">
					<?php
							
						$fp = fopen("../contents/$Edit.php", "a+");
						while(!feof($fp)) {
							$data .= fgets($fp);
						}
						echo $data;
					
					?>
					</textarea>						 
					<br>
				  </td>
				</tr>
			  </table>
			</td>
			<td width="1" background="images/bks/menubox_side_border.gif"><img src="../images/bks/menubox_side_border.gif" width="1" height="28"></td>
		  </tr>
		</table>
	  </td>
    </tr>
    <tr> 
      <td width="7"><img src="images/bks/button1_left.gif" width="7" height="23"></td>
      <td width="605" background="images/bks/button1_fill.gif">&nbsp; </td>
      <td width="264" background="images/bks/button1_fill.gif" align="right"><input name="Submit2" type="submit" class="search_box1" value="Submit">
        <input type="button" name="Submit" value="View" onClick="window.location='?AdminPageID=Contents&View=<?php echo $Edit; ?>'" class="search_box1"> 
        <input type="button" name="Submit" value="Back" onClick="javascript: history.back()" class="search_box1"></td>
      <td width="7"><img src="images/bks/button1_right.gif" width="7" height="23"></td>
    </tr>
  </table>
</form>