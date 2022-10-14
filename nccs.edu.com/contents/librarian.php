<script src="../SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {font-size: 12px}
.style4 {font-size: 12}
-->
</style>
<div id="CollapsiblePanel1" class="CollapsiblePanel">
  <div class="CollapsiblePanelTabHover style3" tabindex="0"><strong><img src="<?=$Images;?>icons/articles.GIF" alt="" width="10" height="11" align="absmiddle" />News/Articles</strong></div>
  <div class="CollapsiblePanelContent"><?php include"news_articles.php";?></div>
</div>
<div id="CollapsiblePanel2" class="CollapsiblePanel">
  <div class="CollapsiblePanelTabHover style4 style3" tabindex="0"><strong>Edit Books</strong></div>
  <div class="CollapsiblePanelContent"><?php include"news_articles.php";?></div>
</div>
<script type="text/javascript">
<!--
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1", {contentIsOpen:false});
var CollapsiblePanel2 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel2", {contentIsOpen:false});
//-->
</script>
