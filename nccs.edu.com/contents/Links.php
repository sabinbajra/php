<table width="510" border="0" cellspacing="0" cellpadding="0" class="text">
  <tr> 
    <td width="7"><img src="../admin/images/bks/button1_left.gif" width="7" height="23"></td>
    <td width="510" background="../admin/images/bks/button1_fill.gif"><strong><img src="../images/icons/hlink.gif" width="16" height="16" align="absmiddle"> 
      Link(s)</strong> </td>
    <td width="7"><img src="../admin/images/bks/button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
    <td colspan="3">
      <table width="500" border="0" cellspacing="0" cellpadding="2" align="center" class="text">
        <tr> 
          <td> 
            <?php
				// for links...
				$QueryLinks = "SELECT * FROM tbl_links ORDER BY id DESC";
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
                <td><?=$LinksShow[size];?></td>
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
                <td colspan="3" height="10"><img src="../../images/spacer.gif" width="1" height="1"></td>
              </tr>
              <tr class="EE"> 
                <td colspan="3" height="1"><img src="../../images/spacer.gif" width="1" height="1"></td>
              </tr>
              <?			
						} // End of While $LinksShow...
					?>
            </table>
            <?
				} // End of Else for Links...
				?>
          </td>
        </tr>
      </table>	
	</td>
  </tr>
</table>
