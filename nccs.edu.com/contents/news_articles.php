<? // For non members (guests)
	include $Includes."db.php";
	if(!isset($start)) $start = 0;
	$query = "SELECT * FROM tbl_news_articles WHERE approved = 1 order by id DESC LIMIT " . $start . ", 5";
	$result = mysql_query($query);
	
	$num = mysql_num_rows($result);
?> 
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<table width="510" border="0" cellpadding="0" cellspacing="0">
  <tr bgcolor="#F9F8FC">
    <td class="text"><div align="center">
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
        <tr bgcolor="#F3F1F9">
          <td width="10" class="small">&nbsp;</td>
          <td width="110" class="text"><strong>Submitted On</strong></td>
          <td width="265" class="text"><strong>Headlines</strong></td>
          <td width="125" class="text"><strong>Submitted By</strong></td>
        </tr>
        <?php
			  	while ($show = mysql_fetch_array($result)) {
				/*
					if ($alternate == "1") { 
						$color = "#FAFAFA"; 
						$alternate = "2"; 
					} 
					else { 
						$color = "#F9F8FC"; 
						$alternate = "1";
					}
				*/
			  ?>
        <tr class="EE">
          <td class="small"><div align="center"><img src="<?=$Images;?>icons/articles.GIF" width="10" height="11" align="absmiddle" /> </div></td>
          <td class="small"><?=$show[submitted_on];?>
          </td>
          <td class="small"><a href="#" onclick="MM_openBrWindow('<?=$AppConts;?>ViewNewsArticles.php?id=<?=$show[id]?>','News','scrollbars=yes,width=650,height=350')" class="small_lk">
            <?=stripslashes($show[headlines]);?>
          </a> </td>
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
      </table>
    </div></td>
  </tr>
  <tr class="EE" bgcolor="#F3F1F9">
    <td class="small"><div align="right">
      <?php
		if ($num >= 5) {
			if (!$_SESSION) {
				echo "<a href=\"?PageID=Articles\" class=\"small_lk\">more</a> &raquo;&nbsp;&nbsp;";
			}
			else {
				echo "<a href=\"?MemberPageID=Articles\" class=\"small_lk\">more</a> &raquo;&nbsp;&nbsp;";
			}		
		}
	  ?>
    </div></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="510" background="<?=$Images;?>title_bar_hr_btm.gif"><img src="../images/title_bar_hr_btm.gif" height="7" /></td>
  </tr>
</table>