


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
config.height = "200px";
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
<link href="admin.css" rel="stylesheet" type="text/css" />


<form action="?adminID=viewservice&edited=edit_enf" method="post">
<input type="hidden" name="PageName" value="<?=$edit;?>">
<textarea name="contents" cols="42" rows="30" class="text" id="contents">
					<?
					$fp = fopen("../contents/$edit.php", "a+");
						while(!feof($fp)) {
							$data .= fgets($fp);
						}
						echo $data;
					?>
					
					</textarea>	<br><label></label>
      <label>
      <input type="submit" name="Submit2" value="Submit"  class="login_box"/>
      </label>



      <label>
      <input type="button" name="Button" value="Back" onClick="javascript: history.back()" class="login_box"/>
      </label>
</form>




