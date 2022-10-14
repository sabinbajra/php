<table width="510" border="0" cellspacing="0" cellpadding="0" class="text">
  <tr> 
    <td width="7"><img src="../admin/images/bks/button1_left.gif" width="7" height="23"></td>
    <td width="510" background="../admin/images/bks/button1_fill.gif"><strong><img src="../images/icons/image.gif" width="16" height="16" align="absmiddle"> 
      Wallpaper(s)</strong> </td>
    <td width="7"><img src="../admin/images/bks/button1_right.gif" width="7" height="23"></td>
  </tr>
  <tr> 
    <td colspan="3">
	  <table width="500" border="0" cellspacing="0" cellpadding="1" align="center" class="text">
        <tr>
          <td> 
            <?php
	
			// for WallPapers...
			$QueryWPeprs = "SELECT * FROM tbl_wallpapers ORDER BY id ASC";
			$RunQueryWPeprs = mysql_query($QueryWPeprs);
			$NumWPeprs = mysql_num_rows($RunQueryWPeprs);
			
			if ($NumWPeprs == 0) {
				echo "No Wallpaper has been uploaded...";
			}
			else {
				$colNum = 3;
				echo "<table width=\"96%\" border=\"0\" align=\"center\" cellpadding=\"1\" cellspacing=\"0\" class=\"text2\">";
				for($row=0; $row<$NumWPeprs; $row++) {
					$ShowWalPeps = mysql_fetch_array($RunQueryWPeprs);
					
					if($row % $colNum == 0) {
						//if there is no remainder, we want to start a new row
						echo "<TR class=\"AA\">\n";
					}
					//echo "<input type=\"hidden\" name=\"id\" value=\"$show[id]\">";
					echo "<TD class=\"text\"><center><br><img src='../contents/dnld_wallpapers/" . $ShowWalPeps['wall1'] . "'>";
					if (empty($ShowWalPeps['wall3']) && empty($ShowWalPeps['wall4'])) {
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall2]\" target=\"_blank\">800/600</a></center>";					
					}
					else if (empty($ShowWalPeps['wall2']) && empty($ShowWalPeps['wall4'])) {
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall3]\" target=\"_blank\">1024/768</a></center>";					
					}
					else if (empty($ShowWalPeps['wall2']) && empty($ShowWalPeps['wall3'])) {
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall4]\" target=\"_blank\">1152/864</a></center>";					
					}
					else if (empty($ShowWalPeps['wall2'])) {
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall3]\" target=\"_blank\">1024/768</a>";
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall4]\" target=\"_blank\">1152/864</a>";
						echo "<br></center>";					
					}
					else if (empty($ShowWalPeps['wall3'])) {
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall2]\" target=\"_blank\">800/600</a>";
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall4]\" target=\"_blank\">1152/864</a>";
						echo "<br></center>";
					}
					else if ( empty($ShowWalPeps['wall4'])) {
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall2]\" target=\"_blank\">800/600</a>";
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall3]\" target=\"_blank\">1024/768</a>";
						echo "<br></center>";											
					}
					else {
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall2]\" target=\"_blank\">800/600</a>";
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall3]\" target=\"_blank\">1024/768</a>";
						echo "<br><a href=\"../contents/dnld_wallpapers/$ShowWalPeps[wall4]\" target=\"_blank\">1152/864</a></center>";
					}
					echo "</td>";
					
					if(($row % $colNum) == ($colNum - 1) || ($row + 1) == $num) {
						//if there is a remainder of 1, end the row
						//or if there is nothing left in our result set, end the row
						echo "</TR>";
					}
				}
				echo "</table>";
			} // End of Else for WallPapers...
			?>
          </td>
        </tr>
      </table>	
	</td>
  </tr>
</table>