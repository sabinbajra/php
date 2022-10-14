<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr> 
    <td><center>
        <form name="news_articles_form" method="post" action="?AdminPageID=Contents&Added=Add_enf&Db=<?=$AddDB;?>">
          <table border="0" cellspacing="1" cellpadding="2" id="uploadtable">
            <tr> 
              <td width="63" class="text"><strong>Headline</strong></td>
              <td width="256"><input name="headlines" type="text" class="search_box1" size="100"></td>
            </tr>
            <tr> 
              <td valign="top" class="text"><strong>News/Articles</strong></td>
              <td><strong> 
                <textarea name="contents" cols="100" rows="8" class="search_box1" id="contents"></textarea>
                </strong></td>
            </tr>
            <tr> 
              <td width="63" class="text"><strong>Author</strong></td>
              <td width="256"><input name="submitted_by" type="text" class="search_box1" size="40"></td>
            </tr>
            <tr>
              <td valign="top" class="text">&nbsp;</td>
              <td><input type="submit" name="Submit" value="Submit" class="search_box1">
			  <input type="button" name="Submit" value="List News & Articles" onClick="window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=NewsArticles'" class="search_box1">
			  </td>
            </tr>
          </table>
          </form>
      </center></td>
  </tr>
</table>
