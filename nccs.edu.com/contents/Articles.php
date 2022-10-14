<?php
	include ($Includes . "db.php");

	//include ("../include/db.php");
	if(!isset($start)) $start = 0;
	$query = "SELECT * FROM tbl_news_articles WHERE approved = 1 order by id DESC LIMIT " . $start . ", 20";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
	
?> 

<table width="510" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="114" height="22" class="text"> 
      <?php
      	if ($num == 1) {
			echo "<span class=\"text\">Total article $num</span>";	
		}
		else {
			echo "<span class=\"text\">Total articles $num</span>";
		}
	?>
    </td>
  </tr>
  <tr>
    <td>
	  <table width="510" border="0" cellpadding="3" cellspacing="0">
        <?php
			if ($num == 0) {
		?>
        <tr bgcolor="#F3F1F9"> 
          <td class="text">&nbsp;No <strong>Articles</strong> has been submitted 
            yet...</td>
        </tr>
        <?php
			} // End of if($num == 0)
			else {
		?>
        <tr height="23"> 
          <td width="10" background="<?=$AdminImages;?>bks/button1_fill.gif" class="small">&nbsp;</td>
          <td width="118" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Submitted On</strong></td>
          <td width="262" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Headlines</strong></td>
          <td width="120" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Submitted By</strong></td>
        </tr>
        	<?php
			  	while ($show = mysql_fetch_array($result)) {

					if ($alternate == "1") { 
						$color = "#FAFAFA"; 
						$alternate = "2"; 
					} 
					else {
						$color = "#FFFFFF"; //"#F9F8FC"
						$alternate = "1";
					}
			?>
        <tr bgcolor="<?=$color;?>" class="EE"> 
          <td><div align="center"><img src="<?=$Images;?>icons/articles.GIF" width="10" height="11" align="absmiddle"> 
            </div></td>
          <td><?=$show[submitted_on];?></td>
          <td><?php
					$len = strlen($show[headlines]);
					if ($len >= 50) {
						$News	=	stripslashes($show[headlines]);
						echo "<a href=\"#\" onClick=\"MM_openBrWindow('".$AppConts."ViewNewsArticles.php?id=".$show[id]."','News','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">".substr($News,0,50)."...</a>";
					}
					else {
						echo "<a href=\"#\" onClick=\"MM_openBrWindow('".$AppConts."ViewNewsArticles.php?id=".$show[id]."','News','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">".stripslashes($show[headlines])."</a>";						
					}
				?>
          </td>
          <td class="small"><?
				  	if (empty($show[submitted_by])) {
						echo "-----";
					}
					else {
						echo "$show[submitted_by]";
					}
				  ?>
          </td>
        </tr>
        <?php
				} // End of While			
			} //  End of Else
		?>
      </table></td>
  </tr>
</table>