<?php
	include ($Includes . "db.php");

	//include ("../include/db.php");
	if(!isset($start)) $start = 0;
	$query = "SELECT * FROM tbl_news_articles WHERE mem_id = '".$_SESSION['valid_id']."' order by id DESC LIMIT " . $start . ", 20";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
?> 

<table width="510" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="289" height="22" class="text"> 
      <?php
      	if ($num == 1) {
			echo "<span class=\"text\">Total article $num</span>";	
		}
		else {
			echo "<span class=\"text\">Total articles $num</span>";
		}
	?>    </td>
    <td width="221" class="text"><div align="right"><a href="?MemberPageID=ArticlePOST">Add/Post</a>&nbsp;</div></td>
  </tr>
  <tr>
    <td colspan="2">
	  <table width="510" border="0" cellpadding="3" cellspacing="0">
        <tr height="23"> 
          <td width="10" background="<?=$AdminImages;?>bks/button1_fill.gif" class="small">&nbsp;</td>
          <td width="118" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Submitted On</strong></td>
          <td width="325" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text"><strong>Headlines</strong></td>
          <td colspan="3" width="57" background="<?=$AdminImages;?>bks/button1_fill.gif" class="text">&nbsp;</td>
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
						echo "<a href=\"#\" onClick=\"MM_openBrWindow('".$AppConts."ViewNewsArticles.php?id=".$show[id]."','News','scrollbars=yes,width=650,height=350')\" class=\"small_lk\">$show[headlines]</a>";						
					}
				?>          </td>
          <td width="19"> 
          <?
			echo "<center><a href=\"#\" onClick=\"MM_openBrWindow('../contents/ViewNewsArticles.php?id=$show[id]','Sports','scrollbars=yes,width=650,height=350')\" class=\"small_lk\"><img src='../images/icons/ico_detail.gif' border='0' title=\"View News: $show[headlines]\"></a></center>";
		  ?>          </td>
          <td width="19"> 
          <?
			echo "<center><a href=\"?MemberPageID=ArticleModify&id=".$show[id]."\"><img src='../images/icons/ico_edit.gif' border='0' title=\"Edit News: $show[headlines]\"></a></center>";
		  ?>          </td>
          <td width="19"> 
          <?
			echo "<center><a href=\"?MemberPageID=ArticleENF&Db=DELETE&id=".$show[id]."&mem_id=".$_SESSION['valid_id']."\" onclick=\"return confirm('Are you sure to delete this News')\"><img src='../images/icons/ico_delete.gif' border='0' title=\"Delete News: $show[headlines]\"></a></center>";						
		  ?>          </td>
        </tr>
        <?php
				} // End of While			
		?>
      </table></td>
  </tr>
</table>
