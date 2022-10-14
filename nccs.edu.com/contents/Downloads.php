<?php
	include ($Includes . "db.php");
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<?php
	if(!$_SESSION["valid_user"]) echo "<br>";
	if($_SESSION["valid_user"]) {
?>
<table width="510" border="0" cellspacing="0" cellpadding="0" class="text">
  <tr> 
    <td height="5"><img src="<?=$Images;?>spacer.gif"></td>
  </tr>
  <tr> 
    <td>
	  
    </td>
  </tr>
</table>
<?
	} // End of if...
?>
<?php
	if ($DLPageID == "Links" ) {
		include "../contents/" . $DLPageID . ".php";
	}
	else {
?>
<table width="510" border="0" cellspacing="0" cellpadding="0" class="text">
  <tr> 
    <td width="7"><img src="<?=$AdminImages;?>button1_left.gif" width="7" height="23"></td>
    <td width="510" background="<?=$AdminImages;?>button1_fill.gif"><strong><img src="<?=$Images;?>icons/hlink.gif" width="16" height="16" align="absmiddle"> 
      Link(s)</strong> </td>
    <td width="7"><img src="<?=$AdminImages;?>button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
    <td colspan="3"> <table width="500" border="0" cellspacing="0" cellpadding="2" align="center" class="text">
        <tr> 
          <td> 
            <?php
				// for links...
				$QueryLinks = "SELECT * FROM tbl_links ORDER BY id DESC LIMIT 5";
				$RunQueryLinks = mysql_query($QueryLinks);
				$NumLinks = mysql_num_rows($RunQueryLinks);

				if ($NumLinks == 0) {
					echo "No Scripts/Tutorials has been uploaded...";
				}
				else {			
				?>
            <table width="96%" border="0" align="center" cellpadding="1" cellspacing="0" class="text2">
              <?php
						while ($LinksShow = mysql_fetch_array($RunQueryLinks)) {
				  ?>
              <tr> 
                <td width="17%"><strong>Name</strong></td>
                <td width="1%"><div align="center">:</div></td>
                <td><a href="<?=$LinksShow[url];?>" target="_blank"> 
                  <?=$LinksShow[name];?>
                  </a></td>
              </tr>
              <?php
			  	if (empty($LinksShow["size"])) {
					echo "";
				}
				else {
			  ?>
              <tr> 
                <td valign="top"><strong>Size</strong></td>
                <td valign="top"> <div align="center">:</div></td>
                <td> 
                  <?=$LinksShow[size];?>
                </td>
              </tr>
              <?
			  	} // end of else for size...
			  ?>
              <tr> 
                <td valign="top"><strong>Description</strong></td>
                <td valign="top"> <div align="center">:</div></td>
                <td width="82%" valign="middle"> 
                  <?=$LinksShow[description];?>
                </td>
              </tr>
              <tr> 
                <td colspan="3" height="10"><img src="<?=$Images;?>spacer.gif" width="1" height="1"></td>
              </tr>
              <tr class="EE"> 
                <td colspan="3" height="1"><img src="<?=$Images;?>spacer.gif" width="1" height="1"></td>
              </tr>
              <?			
						} // End of While $LinksShow...
					?>
            </table>
            <?
					if($_SESSION["valid_user"]) {
					if ($NumLinks >= 5) {
						echo "<table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"text2\">
								<tr> 
								<td><div align=\"right\"><a href=\"?MemberPageID=Downloads&DLPageID=Links\" class=\"small_lk\">More >></a></div></td>
								</tr>
							  </table>";
					}
					}
					else { echo "<br>";}
				} // End of Else for Links...
				?>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="7">&nbsp;</td>
    <td width="750" background="<?=$AdminImages;?>button1_fill.gif">&nbsp;</td>
    <td width="7"><img src="<?=$AdminImages;?>button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="7">&nbsp;</td>
    <td width="750" background="<?=$AdminImages;?>button1_fill.gif">&nbsp;</td>
    <td width="7"><img src="<?=$AdminImages;?>button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="7">&nbsp;</td>
    <td width="750" background="<?=$AdminImages;?>button1_fill.gif">&nbsp;</td>
    <td width="7"><img src="<?=$AdminImages;?>button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<?php
	} // End of Else
?>