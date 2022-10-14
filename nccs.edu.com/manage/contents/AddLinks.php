<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr> 
    <td><center>
        <form method="post" action="?AdminPageID=Contents&Added=Add_enf&Db=<?=$AddDB;?>" name="links_form">
          <table border="0" cellspacing="1" cellpadding="2" id="uploadtable">
            <tr> 
              <td width="82" class="text"><strong>Name</strong></td>
              <td width="399" class="small"><input name="name" type="text" class="search_box1" size="100"> 
              </td>
            </tr>
            
            <tr> 
              <td class="text"><strong>URL</strong></td>
              <td><input name="url" type="text" class="search_box1" value="http://" size="100"></td>
            </tr>
            <tr> 
              <td valign="top" class="text"><strong>Description</strong></td>
              <td><strong> 
                <textarea name="description" cols="100" rows="8" class="search_box1" id="contents"></textarea>
                </strong></td>
            </tr>
            <tr> 
              <td valign="top" class="text">&nbsp;</td>
              <td><input type="submit" name="Submit" value="Submit" class="search_box1">
			  <input type="button" name="Submit" value="List Links" onClick="window.location='??AdminPageID=Contents&List=ListingDB&ViewDB=Links'" class="search_box1">
			  </td>
            </tr>
          </table>
          </form>
      </center></td>
  </tr>
</table>
