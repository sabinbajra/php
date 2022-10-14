<br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr> 
    <td><center>
        <form name="events_form" method="post" action="?AdminPageID=Contents&Added=Add_enf&Db=<?=$AddDB;?>">
          <table border="0" cellspacing="1" cellpadding="2" id="uploadtable">
            <tr> 
              <td width="63" class="text"><strong>Date</strong></td>
              <td width="402" class="small"><input name="date" type="text" class="search_box1" size="40"> <font color="#666666">Eg: February 10, 2006</font></td>
            </tr>
            <tr> 
              <td valign="top" class="text"><strong>Events</strong></td>
              <td><strong> 
                <textarea name="events" cols="100" rows="8" class="search_box1" id="events"></textarea>
                </strong></td>
            </tr>
            <tr>
              <td valign="top" class="text">&nbsp;</td>
              <td><input type="submit" name="Submit2" value="Submit" class="search_box1">
			  <input type="button" name="Submit" value="List Events" onClick="window.location='?AdminPageID=Contents&List=ListingDB&ViewDB=Events'" class="search_box1">
			  </td>
            </tr>
          </table>
          </form>
      </center></td>
  </tr>
</table>
